<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Venta;
use App\Models\DetalleVenta;
use App\Models\Usuario;

class CarritoController extends Controller
{
    // 1. Ver el contenido del carrito
    public function index()
    {
        $carrito = session()->get('carrito', []);
        return view('carrito', compact('carrito'));
    }

    // 1. Método para agregar (soporta el catálogo y el botón + del carrito)
    public function agregar(Request $request, $id)
    {
        $carrito = session()->get('carrito', []);

        // ✨ NUEVO: Buscamos el producto primero para validar que le quede stock real en la BD
        $producto = Producto::findOrFail($id);

        // 🚫 VALIDACIÓN CRÍTICA: Si el stock actual es 0, rebota la acción de inmediato
        if ($producto->stock <= 0) {
            return redirect()->back()->with('error', 'Lo sentimos, este artículo se encuentra temporalmente sin stock disponible.');
        }

        // Si ya está en el carrito, controlamos que no pida más de lo que tenemos en góndola
        if (isset($carrito[$id])) {
            if ($carrito[$id]['cantidad'] >= $producto->stock) {
                return redirect()->back()->with('error', "No puedes agregar más unidades. El stock máximo disponible es de {$producto->stock} prendas.");
            }
            $carrito[$id]['cantidad']++;
        } else {
            $cantidadInicial = $request->input('cantidad', 1);

            // Controlamos por seguridad que la cantidad inicial no sea mayor al stock
            if ($cantidadInicial > $producto->stock) {
                return redirect()->back()->with('error', "No puedes agregar esa cantidad. El stock disponible es de {$producto->stock} unidades.");
            }

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
            if ($carrito[$id]['cantidad'] > 1) {
                $carrito[$id]['cantidad']--;
            } else {
                unset($carrito[$id]);
            }
            session()->put('carrito', $carrito);
        }

        return redirect()->back()->with('exito', 'Cantidad actualizada.');
    }

    // 4. Eliminar un producto completo
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
        session()->forget('carrito');
        return redirect()->back()->with('exito', 'Se vació el carrito correctamente.');
    }

    public function checkout()
    {
        $carrito = session()->get('carrito', []);

        if (empty($carrito)) {
            return redirect()->route('catalogo.index')->with('stock_error', 'Tu carrito está vacío.');
        }

        // Buscamos los datos del usuario logueado para pasárselos a la vista de pago
        $userId = session('user_id') ?? auth()->id();
        $usuario = Usuario::find($userId);

        return view('pago', compact('carrito', 'usuario'));
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
            'localization' => 'required|string|max:100',
            'direccion' => 'required|string|max:255',
            'medio_pago' => 'required|in:tarjeta,efectivo',
        ]);

        if ($request->input('medio_pago') === 'tarjeta') {
            $request->validate([
                'tarjeta_nombre' => 'required|string|max:150',
                'tarjeta_numero' => 'required|digits:16',
                'tarjeta_vence'  => 'required|string|min:5|max:5',
                'tarjeta_cvv'    => 'required|digits_between:3,4',
            ]);

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

        // 2. Guardar/Actualizar los datos directamente en el perfil del Usuario
        $userId = session('user_id') ?? auth()->id();
        if ($userId) {
            $usuario = Usuario::find($userId);
            if ($usuario) {
                $usuario->update([
                    'provincia' => $request->input('provincia'),
                    'localidad' => $request->input('localization'),
                    'direccion' => $request->input('direccion'),
                ]);
            }
        }

        // 3. GENERAR REFERENCIA Y ESTADO SEGÚN EL MEDIO DE PAGO
        $referencia = null;
        $estadoInicial = 'pagado';
        if ($request->input('medio_pago') === 'efectivo') {
            $referencia = 'MJ-' . rand(10000, 99999);
            $estadoInicial = 'pendiente';
        }

        // ✨ CALCULAR EL TOTAL GENERAL DEL CARRITO PARA GUARDAR LA VENTA
        $totalGeneral = 0;
        foreach ($carrito as $item) {
            $totalGeneral += $item['precio'] * $item['cantidad'];
        }

        // ✨ NUEVO PASO A: Crear la venta general (madre)
        $nuevaVenta = Venta::create([
            'user_id'         => $userId,
            'provincia'        => $request->input('provincia'),
            'localidad'        => $request->input('localization'),
            'direccion'        => $request->input('direccion'),
            'medio_pago'       => $request->input('medio_pago'),
            'referencia_pago'  => $referencia,
            'total'            => $totalGeneral,
            'estado'           => $estadoInicial
        ]);

        // ✨ OBLIGATORIO: Buscamos el usuario completo para garantizar que el ID y Correo existan y nunca sean nulos
        $usuarioCompleto = Usuario::findOrFail($userId);
        $correoUsuario = $usuarioCompleto->correo;

        // ✨ NUEVO PASO B: Recorrer el carrito, guardar el detalle y reducir el stock
        foreach ($carrito as $idDelArray => $item) {
            $idProductoReal = $item['id'] ?? $idDelArray;

            DetalleVenta::create([
                'venta_id'        => $nuevaVenta->id,
                'id_usuario'      => $userId,
                'correo'          => $correoUsuario,
                'id_producto'     => $idProductoReal,
                'nombre_producto' => $item['nombre'],
                'precio_unitario' => $item['precio'],
                'cantidad'        => $item['cantidad']
            ]);

            // 🎯 LOGICA DE STOCK: Buscamos la prenda en la base de datos y descontamos la cantidad vendida
            $producto = Producto::find($idProductoReal);
            if ($producto) {
                $producto->decrement('stock', $item['cantidad']);
            }
        }

        // 4. LIMPIAMOS EL CARRITO DE LA SESIÓN (Ya quedó guardado en la base de datos)
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
        if (!session()->has('compra_completada')) {
            return redirect()->route('catalogo.index');
        }

        return view('compra-exitosa');
    }

    /**
     * Muestra el historial de compras del usuario autenticado.
     */
    public function historial()
    {
        // 1. Obtener el ID del usuario en sesión
        $userId = session('user_id') ?? auth()->id();

        if (!$userId) {
            return redirect()->route('login')->withErrors(['login_error' => 'Debe iniciar sesión para ver su historial.']);
        }

        // 2. Consultar las ventas de este usuario de la más reciente a la más vieja
        $compras = Venta::where('user_id', $userId)
            ->orderBy('id', 'desc')
            ->get();

        // 3. Retornar la vista verHistorial
        return view('verHistorial', compact('compras'));
    }
}
