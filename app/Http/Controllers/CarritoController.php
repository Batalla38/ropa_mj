<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; // Asegúrate de tener tu modelo Producto
use Illuminate\Support\Facades\DB; // <-- AGREGA ESTA LÍNEA

class CarritoController extends Controller
{
    // Muestra la pantalla del carrito con los productos acumulados
    public function ver()
    {
        // Tomamos el carrito de la sesión. Si no existe, pasamos un arreglo vacío.
        $carrito = session()->get('carrito', []);
        
        // Calculamos el precio total sumando (precio * cantidad) de cada prenda
        $total = 0;
        foreach($carrito as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        return view('carrito', compact('carrito', 'total'));
    }

    // Agrega un producto al carrito (Funciona para logueados y visitantes)
    public function agregar(Request $request, $id)
    {
        // 1. Buscamos el producto en la base de datos para validar que existe y tener su precio/imagen
        $producto = DB::table('producto')->where('id', $id)->first(); 
        // Nota: Si usas el modelo Producto, puedes usar: Producto::findOrFail($id);

        if (!$producto) {
            return redirect()->back()->with('error', 'El producto no existe.');
        }

        // 2. Traemos el carrito actual de la sesión
        $carrito = session()->get('carrito', []);

       // 3. NUEVO: Capturamos la cantidad exacta que viene del formulario HTML
        // Si por algún motivo viene vacío, por defecto le ponemos 1
        $cantidadSeleccionada = (int) $request->input('cantidad', 1);

        // 4. Si el producto ya estaba en el carrito, le sumamos la cantidad seleccionada
        if(isset($carrito[$id])) {
            $carrito[$id]['cantidad'] += $cantidadSeleccionada;
        } else {
            // Si es nuevo, lo agregamos con los datos dinámicos
            $carrito[$id] = [
                "nombre"   => $producto->nombre,
                "cantidad" => $cantidadSeleccionada, // Usa los que el usuario sumó con el +
                "precio"   => $producto->precio,
                "imagen"   => $producto->url_imagen ?? 'bg1.png' // Corregido según tu phpMyAdmin
            ];
        }

        // 5. Guardamos el carrito actualizado en la sesión
        session()->put('carrito', $carrito);

        // --- CAMBIO CLAVE: Volvemos a la misma página del producto con el mensaje verde ---
        return redirect()->back()->with('success', '¡Excelente! El producto se agregó al carrito correctamente.');
    }
}
