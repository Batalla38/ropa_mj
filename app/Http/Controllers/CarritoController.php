<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CarritoController extends Controller
{
    // Muestra la pantalla del carrito con los productos acumulados
    public function ver()
    {
        $carrito = session()->get('carrito', []);
        
        $total = 0;
        foreach($carrito as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        return view('carrito', compact('carrito', 'total'));
    }

    // Agrega un producto al carrito controlando el Stock
    public function agregar(Request $request, $id)
    {
        // 1. Buscamos el producto real usando la tabla 'productos' (plural, como mapeamos antes)
        $producto = DB::table('productos')->where('id', $id)->first(); 

        // 2. SIMULACIÓN INTELIGENTE: Si tu base de datos está vacía todavía
        if (!$producto) {
            $producto = (object) [
                'id' => 1,
                'nombre' => 'Conjunto a Rayas',
                'precio' => 90000,
                'url_imagen' => 'ropa Hombre/ConjuntoRayasH.jpg',
                'stock' => 10 // Le asignamos stock ficticio para las pruebas
            ];
        }

        // 3. Traemos el carrito actual de la sesión
        $carrito = session()->get('carrito', []);

        // 4. Capturamos la cantidad exacta del formulario
        $cantidadSeleccionada = (int) $request->input('cantidad', 1);

        // 5. --- CONTROL DE STOCK ANTES DE AGREGAR ---
        $cantidadActualEnCarrito = isset($carrito[$id]) ? $carrito[$id]['cantidad'] : 0;
        $cantidadTotalSolicitada = $cantidadActualEnCarrito + $cantidadSeleccionada;

        if (isset($producto->stock) && $cantidadTotalSolicitada > $producto->stock) {
            return redirect()->back()->withErrors([
                'stock_error' => "No puedes agregar esa cantidad. Stock disponible: {$producto->stock} unidades (Ya tienes {$cantidadActualEnCarrito} en el carrito)."
            ]);
        }

        // 6. Sumamos cantidad o creamos el artículo en el arreglo
        if(isset($carrito[$id])) {
            $carrito[$id]['cantidad'] = $cantidadTotalSolicitada;
        } else {
            $carrito[$id] = [
                "nombre"   => $producto->nombre,
                "cantidad" => $cantidadSeleccionada,
                "precio"   => $producto->precio,
                "imagen"   => $producto->url_imagen ?? 'bg1.png'
            ];
        }

        // 7. Guardamos el carrito en la sesión
        session()->put('carrito', $carrito);

        // 8. Forzamos el guardado del mensaje en la sesión (por seguridad)
        session()->flash('success', '¡Excelente! El producto se agregó al carrito correctamente.');
        session()->save(); 

        // =========================================================
        //  CAMBIO EXPLICITO: PASAMOS EL AVISO DIRECTO POR LA URL
        // =========================================================
        return redirect()->route('producto.show', ['id' => $id, 'check' => 1]);
    }

    // Elimina un artículo del carrito
    public function eliminar($id)
    {
        $carrito = session()->get('carrito', []);

        if(isset($carrito[$id])) {
            unset($carrito[$id]);
            session()->put('carrito', $carrito);
        }

        return redirect()->route('carrito.ver')->with('status', 'Producto quitado del carrito.');
    }

    // Procesar Compra descontando el stock real de la Base de Datos
    public function procesarCompra(Request $request)
    {
        // Verificar si inició sesión por el método manual que usan
        if (!session()->has('user_id')) {
            return redirect('/login')->withErrors([
                'correo' => 'Debes iniciar sesión o registrarte para finalizar tu compra. ¡Tu carrito se guardó perfectamente!'
            ]);
        }

        $carrito = session()->get('carrito', []);

        if (empty($carrito)) {
            return redirect('/catalogo')->withErrors(['carrito_error' => 'El carrito está vacío.']);
        }

        // 1. CONTROL DE STOCK FINAL: Validamos todos los artículos antes de tocar nada
        foreach ($carrito as $id => $item) {
            $producto = DB::table('productos')->where('id', $id)->first();
            
            // Si el producto real existe en la BD, verificamos su stock actual
            if ($producto && $item['cantidad'] > $producto->stock) {
                return redirect()->route('carrito.ver')->withErrors([
                    'stock_final' => "Lo sentimos, el producto '{$item['nombre']}' ya no cuenta con stock suficiente para tu orden (Disponibles: {$producto->stock})."
                ]);
            }
        }

        // 2. DESCUENTO DE STOCK REAL EN LA BD
        foreach ($carrito as $id => $item) {
            $producto = DB::table('productos')->where('id', $id)->first();
            if ($producto) {
                DB::table('productos')
                    ->where('id', $id)
                    ->update(['stock' => $producto->stock - $item['cantidad']]);
            }
        }

        // 3. Limpiamos el carrito y cerramos transacción exitosa
        session()->forget('carrito');
        return redirect('/main')->with('success', '¡Gracias por tu compra en Ropa MJ! Tu pedido fue procesado y el stock actualizado.');
    }
}