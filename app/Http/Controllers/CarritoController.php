<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; 

class CarritoController extends Controller
{
    // 1. Ver el contenido del carrito
    public function index()
    {
        // Trae lo que haya en la sesión, si no hay nada inicializa un array vacío []
        $carrito = session()->get('carrito', []);

        // Mandamos a la vista ÚNICAMENTE la variable 'carrito' de forma correcta
        return view('carrito', compact('carrito'));
    }

    // 2. Agregar un producto o sumar cantidad
    public function agregar(Request $request, $id)
    {
        // Buscamos el producto usando tu clave real: id
        $producto = Producto::findOrFail($id);
        $carrito = session()->get('carrito', []);

        if(isset($carrito[$id])) {
            $carrito[$id]['cantidad']++;
        } else {
            // Mapeamos con 'url_imagen' que es tu columna real
            $carrito[$id] = [
                "nombre" => $producto->nombre,
                "cantidad" => 1,
                "precio" => $producto->precio,
                "url_imagen" => $producto->url_imagen 
            ];
        }

        session()->put('carrito', $carrito);
        return redirect()->back()->with('exito', 'Producto añadido al carrito.');
    }

    // 3. Restar cantidad
    public function restar($id)
    {
        $carrito = session()->get('carrito', []);

        if(isset($carrito[$id])) {
            if($carrito[$id]['cantidad'] > 1) {
                $carrito[$id]['cantidad']--;
            } else {
                unset($carrito[$id]); 
            }
            session()->put('carrito', $carrito);
        }

        return redirect()->back()->with('exito', 'Carrito actualizado.');
    }

    // 4. Eliminar un producto completo
    public function eliminar($id)
    {
        $carrito = session()->get('carrito', []);

        if(isset($carrito[$id])) {
            unset($carrito[$id]);
            session()->put('carrito', $carrito);
        }

        return redirect()->back()->with('exito', 'Producto removido del carrito.');
    }

    // 5. Vaciar todo el carrito
    public function vaciar()
    {
        session()->forget('carrito');
        return redirect()->route('carrito.index')->with('exito', 'El carrito se vació por completo.');
    }
}