<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function guardar(Request $request)
    {
        // 1. Validar campos
        $request->validate([
            'titulo'      => 'required|string|max:100',
            'descripcion' => 'required|string',
            'precio'      => 'required|numeric|min:0',
            'generos'     => 'required|array',
            'talles'      => 'required|array',
            'stock'       => 'required|integer|min:0',
            'url_imagen'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'activo'      => 'required|boolean',
        ]);

        // 2. Mapear datos con la DB
        $producto = new Producto();
        $producto->nombre      = $request->input('titulo');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio      = $request->input('precio');
        $producto->stock       = $request->input('stock');
        $producto->activo      = $request->input('activo');

        // Convierte los grupos de checkboxes a texto ("masculino", "X, XL")
        $producto->genero = implode(', ', $request->input('generos'));
        $producto->talle  = implode(', ', $request->input('talles'));

        // 3. Guardar imagen física
        if ($request->hasFile('url_imagen')) {
            $imagen = $request->file('url_imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('images'), $nombreImagen);
            $producto->url_imagen = $nombreImagen;
        } else {
            $producto->url_imagen = 'default.png';
        }

        // 4. Guardar
        $producto->save();

        return redirect()->back()->with('success', '¡Producto guardado exitosamente en la base de datos!');
    }
}
