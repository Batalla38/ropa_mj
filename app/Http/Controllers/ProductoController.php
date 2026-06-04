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
            'nombre'      => 'required|string|max:100',
            'descripcion' => 'required|string',
            'precio'      => 'required|numeric|min:0',
            'genero'     => 'required|array',
            'talle'      => 'required|array',
            'stock'       => 'required|integer|min:0',
            'url_imagen'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'activo'      => 'required|boolean',
        ]);

        // 2. Mapear datos con la DB
        $producto = new Producto();
        $producto->nombre      = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio      = $request->input('precio');
        $producto->genero      = $request->input('genero');
        $producto->talle       = $request->input('talle');
        $producto->stock       = $request->input('stock');
        $producto->activo      = $request->input('activo');


        // Convierte los arreglos de checkboxes a texto plano ("masculino, femenino", "X, XL")
        $producto->genero = implode(', ', $request->input('genero'));
        $producto->talle  = implode(', ', $request->input('talle'));

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

<<<<<<< HEAD
        // 4. Guardar directamente en phpMyAdmin
        $producto->save(); // <--- ¡ESTA ES LA LÍNEA MÁGICA QUE TE FALTA!
=======
        // 4. Guardar
        $producto->save();
>>>>>>> 698e7a5b5d7de9ad8de69827757757cc15b17cfa

        return redirect()->back()->with('success', '¡Producto guardado exitosamente en la base de datos!');
    }
}
