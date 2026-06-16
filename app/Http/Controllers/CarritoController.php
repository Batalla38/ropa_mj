<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; 

class CarritoController extends Controller
{
    // 1. Ver el contenido del carrito
    // Cambiamos el nombre a index para que coincida con tu ruta vieja
    public function index()
    {
        $carrito = session()->get('carrito', []);
        return view('carrito', compact('carrito'));
    }

    // 1. Método para agregar (soporta el catálogo y el botón + del carrito)
    public function agregar(Request $request, $id)
    {
        $carrito = session()->get('carrito', []);

        // Si el producto ya existe en el carrito, solo le sumamos 1 a la cantidad
        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad']++;
        } else {
            // Si no existe, es porque viene desde el catálogo/detalle por primera vez
            $producto = Producto::findOrFail($id);
            
            // Tomamos la cantidad que venga del formulario, si no viene ninguna (catálogo), por defecto es 1
            $cantidadInicial = $request->input('cantidad', 1);

            $carrito[$id] = [
                "nombre" => $producto->nombre,
                "cantidad" => $cantidadInicial,
                "precio" => $producto->precio,
                "url_imagen" => $producto->url_imagen
            ];
        }

        session()->put('carrito', $carrito);
        return redirect()->back()->with('exito', 'Carrito actualizado correctamente.');
    }

    // 2. Método para el botón "-"
    public function restar($id)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            // Si hay más de una unidad, restamos 1
            if ($carrito[$id]['cantidad'] > 1) {
                $carrito[$id]['cantidad']--;
            } else {
                // Si queda solo 1 unidad y resta, lo removemos por completo
                unset($carrito[$id]);
            }
            session()->put('carrito', $carrito);
        }

        return redirect()->back()->with('exito', 'Cantidad actualizada.');
    }

    // 4. Eliminar un producto completo
    // El método se tiene que llamar eliminar como dice tu web.php
    public function eliminar($id)
    {
        $carrito = session()->get('carrito', []);

        if(isset($carrito[$id])) {
            unset($carrito[$id]);
            session()->put('carrito', $carrito);
        }

        return redirect()->back()->with('exito', 'Producto eliminado del carrito.');
    }

    // 5. Vaciar todo el carrito
    public function vaciar()
    {
        // Limpiamos todo el array del carrito de la sesión
        session()->forget('carrito');

        return redirect()->back()->with('exito', 'Se vació el carrito correctamente.');
    }

    public function checkout()
    {
        $carrito = session()->get('carrito', []);

        if (empty($carrito)) {
            return redirect()->route('catalogo.index')->with('stock_error', 'Tu carrito está vacío.');
        }

        // === CAMBIO ACÁ: Ahora busca 'pago' en vez de 'checkout' ===
        return view('pago', compact('carrito'));
    }
    public function procesarPago(Request $request)
    {
        $carrito = session()->get('carrito', []);
        if (empty($carrito)) {
            return redirect()->route('catalogo.index');
        }

        // 1. Validaciones básicas comunes (Envío)
        $request->validate([
            'provincia' => 'required|string|max:100',
            'localization' => 'required|string|max:100',
            'direccion' => 'required|string|max:255',
            'medio_pago' => 'required|in:tarjeta,efectivo',
        ]);

        // 2. Si eligió tarjeta, validamos estrictamente los campos de la tarjeta
        if ($request->input('medio_pago') === 'tarjeta') {
            // 1. Validaciones de formato básicas
            $request->validate([
                'tarjeta_nombre' => 'required|string|max:150',
                'tarjeta_numero' => 'required|digits:16',
                'tarjeta_vence'  => 'required|string|min:5|max:5', // Espera formato MM/AA (5 caracteres)
                'tarjeta_cvv'    => 'required|digits_between:3,4',
            ]);

            // 2. 🧠 VALIDACIÓN DE VENCIMIENTO TEMPORAL
            $vencimiento = $request->input('tarjeta_vence'); // Ej: "12/25" o "08/26"
            
            // Separamos el mes y el año usando la barra como corte
            $partes = explode('/', $vencimiento);
            
            if (count($partes) === 2) {
                $mesTarjeta = (int)$partes[0];
                $anioTarjeta = (int)$partes[1] + 2000; // Pasamos "26" a 2026

                // Obtenemos el mes y año real de hoy (Año: 2026)
                $anioActual = (int)date('Y');
                $mesActual = (int)date('m');

                // Si el año es menor al actual, o es el mismo año pero el mes ya pasó... ¡VENCIDA!
                if ($anioTarjeta < $anioActual || ($anioTarjeta === $anioActual && $mesTarjeta < $mesActual) || $mesTarjeta < 1 || $mesTarjeta > 12) {
                    return redirect()->back()
                        ->withInput() // Conserva lo que escribió el usuario para que no rellene todo de nuevo
                        ->withErrors(['tarjeta_vence' => 'La tarjeta ingresada se encuentra vencida. Por favor, use una tarjeta vigente.']);
                }
            } else {
                // Por si escriben cualquier cosa que no tenga una barra
                return redirect()->back()->withInput()->withErrors(['tarjeta_vence' => 'El formato de vencimiento debe ser MM/AA.']);
            }
        }
        
        // 3. Si eligió efectivo, generamos un código de referencia aleatorio (Ej: MJ-84729)
        $referencia = null;
        if ($request->input('medio_pago') === 'efectivo') {
            $referencia = 'MJ-' . rand(10000, 99999);
        }

        // 4. Limpiamos el carrito de la sesión porque la compra ya se efectuó
        session()->forget('carrito');

        // 5. Redirigimos a la pantalla de éxito pasando los datos clave por sesión flash
        return redirect()->route('carrito.exito')->with([
            'compra_completada' => true,
            'medio_pago' => $request->input('medio_pago'),
            'referencia' => $referencia
        ]);
    }

    public function compraExitosa()
    {
        // Si no viene de procesar un pago real, lo sacamos volando al catálogo
        if (!session()->has('compra_completada')) {
            return redirect()->route('catalogo.index');
        }

        return view('compra-exitosa');
    }
}