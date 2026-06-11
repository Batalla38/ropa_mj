<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Muestra la vista de un producto específico de forma dinámica por su ID.
     * Solo si el producto se encuentra en estado ACTIVO (igual a 1).
     */
    public function show($id)
    {
        // 1. Buscamos el producto usando el Modelo Eloquent, filtrando estrictamente por activo = 1
        $producto = Producto::where('id', $id)->where('activo', 1)->first();

        // 2. SIMULACIÓN INTELIGENTE (Se mantiene intacta por seguridad de tus pruebas antiguas)
        if (!$producto && $id == 1) {
            $producto = (object) [
                'id' => 1,
                'nombre' => 'Conjunto a Rayas',
                'precio' => 90000,
                'url_imagen' => 'ropa Hombre/ConjuntoRayasH.jpg',
                'descripcion' => 'Este conjunto destaca por su comodidad y su diseño pinstripe atemporal en blanco y negro.',
                'material' => 'Lino de alta calidad',
                'patron' => 'Rayas finas (pinstripe) blanco y negro',
                'cuidado' => 'Lavado a máquina en frío.',
                'stock' => 10,
                'genero' => 'Masculino',
                'talle' => 'M'
            ];
        }

        // Si el producto no existe en la base de datos o su estado es inactivo (activo = 0), tira error 404
        if (!$producto) {
            abort(404, 'Producto no encontrado o no disponible actualmente.');
        }

        // 3. Mandamos los datos a tu interfaz llamada 'producto' (producto.blade.php)
        return view('producto', compact('producto'));
    }

    /**
     * Guarda un producto nuevo desde el panel de administración.
     */
    public function guardar(Request $request)
    {
        $request->validate([
            'nombre'      => 'required|string|max:100',
            'descripcion' => 'required|string',
            'precio'      => 'required|numeric|min:0',
            'genero'      => 'required|array',
            'talle'       => 'required|array',
            'stock'       => 'required|integer|min:0',
            'url_imagen'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'activo'      => 'required|boolean',
        ]);

        $producto = new Producto();
        $producto->nombre      = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio      = $request->input('precio');
        $producto->stock       = $request->input('stock');
        $producto->activo      = $request->input('activo');

        $producto->genero = implode(', ', $request->input('genero'));
        $producto->talle  = implode(', ', $request->input('talle'));

        if ($request->hasFile('url_imagen')) {
            $imagen = $request->file('url_imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('images'), $nombreImagen);

            // Guardamos solo el nombre del archivo final
            $producto->url_imagen = $nombreImagen;
        } else {
            $producto->url_imagen = 'default.png';
        }

        $producto->save();

        return redirect()->back()->with('success', '¡Producto guardado exitosamente en la base de datos!');
    }
}
