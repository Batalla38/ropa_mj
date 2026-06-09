<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; // Asegúrate de tener tu modelo Producto

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
        $producto = DB::table('productos')->where('id_producto', $id)->first(); 
        // Nota: Si usas el modelo Producto, puedes usar: Producto::findOrFail($id);

        if (!$producto) {
            return redirect()->back()->with('error', 'El producto no existe.');
        }

        // 2. Traemos el carrito actual de la sesión
        $carrito = session()->get('carrito', []);

        // 3. Si el producto ya estaba en el carrito, solo le sumamos 1 a la cantidad
        if(isset($carrito[$id])) {
            $carrito[$id]['cantidad']++;
        } else {
            // Si es nuevo, lo agregamos con cantidad inicial en 1
            $carrito[$id] = [
                "nombre" => $producto->nombre,
                "cantidad" => 1,
                "precio" => $producto->precio,
                "imagen" => $producto->imagen ?? 'bg1.png' // Tu imagen por defecto
            ];
        }

        // 4. Guardamos el carrito actualizado de vuelta en la sesión masiva
        session()->put('carrito', $carrito);

        return redirect()->route('carrito.ver')->with('success', '¡Producto agregado al carrito!');
    }

    // Elimina un artículo del carrito
    public function eliminar($id)
    {
        $carrito = session()->get('carrito', []);

        if(isset($carrito[$id])) {
            unset($carrito[$id]); // Destruye esa prenda del arreglo
            session()->put('carrito', $carrito);
        }

        return redirect()->route('carrito.ver')->with('status', 'Producto quitado del carrito.');
    }

    // El botón definitivo de "Comprar"
    public function procesarCompra(Request $request)
    {
        // REGLA DE ORO: Si no hay un usuario con sesión activa ('user_id')
        if (!session()->has('user_id')) {
            // Lo mandamos al login, pero guardamos un mensaje para avisarle por qué lo sacamos
            return redirect('/login')->withErrors([
                'correo' => 'Debes iniciar sesión o registrarte para finalizar tu compra. ¡Tu carrito se guardó perfectamente!'
            ]);
        }

        // Si está logueado, acá va tu lógica de transacciones/pedidos...
        // Por ahora simulamos el éxito:
        session()->forget('carrito'); // Vaciamos el carrito tras comprar
        return redirect('/')->with('success', '¡Gracias por tu compra en Ropa MJ!');
    }
}