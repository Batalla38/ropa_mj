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

        // 1. VALIDACIONES DE LOS DATOS DE ENVÍO Y PAGO
        $request->validate([
            'provincia' => 'required|string|max:100',
            'localization' => 'required|string|max:100', // Tu input en la vista se llama localization
            'direccion' => 'required|string|max:255',
            'medio_pago' => 'required|in:tarjeta,efectivo',
        ]);

        // Si elige tarjeta, validamos los datos que habías definido con el vencimiento temporal
        if ($request->input('medio_pago') === 'tarjeta') {
            $request->validate([
                'tarjeta_nombre' => 'required|string|max:150',
                'tarjeta_numero' => 'required|digits:16',
                'tarjeta_vence'  => 'required|string|min:5|max:5', // Formato MM/AA
                'tarjeta_cvv'    => 'required|digits_between:3,4',
            ]);

            // Validación lógica del vencimiento (Año actual: 2026)
            $vencimiento = $request->input('tarjeta_vence');
            $partes = explode('/', $vencimiento);
            
            if (count($partes) === 2) {
                $mesTarjeta = (int)$partes[0];
                $anioTarjeta = (int)$partes[1] + 2000;

                $anioActual = (int)date('Y');
                $mesActual = (int)date('m');

                if ($anioTarjeta < $anioActual || ($anioTarjeta === $anioActual && $mesTarjeta < $mesActual) || $mesTarjeta < 1 || $mesTarjeta > 12) {
                    return redirect()->back()
                        ->withInput()
                        ->withErrors(['tarjeta_vence' => 'La tarjeta ingresada se encuentra vencida. Por favor, use una tarjeta vigente.']);
                }
            } else {
                return redirect()->back()->withInput()->withErrors(['tarjeta_vence' => 'El formato de vencimiento debe ser MM/AA.']);
            }
        }

        // 2. ✨ EL PASO CLAVE: Guardar/Actualizar los datos directamente en el perfil del Usuario
        $userId = session('user_id') ?? auth()->id(); // Rescata el ID del usuario logueado
        if ($userId) {
            $usuario = Usuario::find($userId);
            if ($usuario) {
                $usuario->update([
                    'provincia' => $request->input('provincia'),
                    'localidad' => $request->input('localization'), // Guarda tu input localization en el campo localidad
                    'direccion' => $request->input('direccion'),
                ]);
            }
        }

        // 3. GENERAR REFERENCIA SI ES EFECTIVO (Para mostrar en la pantalla de éxito)
        $referencia = null;
        if ($request->input('medio_pago') === 'efectivo') {
            $referencia = 'MJ-' . rand(10000, 99999);
        }

        // 4. LIMPIAMOS EL CARRITO DE LA SESIÓN (La compra ya se procesó)
        session()->forget('carrito');

        // 5. REDIRECCIÓN A LA PANTALLA DE ÉXITO
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