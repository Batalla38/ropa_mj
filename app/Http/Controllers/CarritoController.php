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
}