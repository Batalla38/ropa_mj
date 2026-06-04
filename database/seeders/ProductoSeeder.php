<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function guardar(Request $request)
    {
        // 1. Validar estrictamente lo solicitado
        $request->validate([
            'titulo'     => 'required|string|max:100',
            'precio'     => 'required|numeric|min:0',
            'generos'    => 'required|array',
            'talles'     => 'required|array',
            'stock'      => 'required|integer|min:0',
            'url_imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'activo'     => 'required|boolean',
        ]);

        // 2. Mapear los datos con el Modelo
        $producto = new Producto();
        $producto->nombre = $request->input('titulo');
        $producto->precio = $request->input('precio');
        $producto->stock  = $request->input('stock');
        $producto->activo = $request->input('activo');

        // Unimos las opciones de los checkboxes con comas (Ej: "masculino, nino" o "X, XL")
        $producto->genero = implode(', ', $request->input('generos'));
        $producto->talle  = implode(', ', $request->input('talles'));

        // 3. Subir y procesar la imagen física
        if ($request->hasFile('url_imagen')) {
            $imagen = $request->file('url_imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('images'), $nombreImagen); // Se almacena en public/images/
            $producto->url_imagen = $nombreImagen;
        } else {
            $producto->url_imagen = 'default.png'; // Imagen comodín por si viene vacío
        }

        // 4. Guardar directamente en la base de datos de phpMyAdmin
        $producto->save();

        // 5. Redireccionar hacia atrás con alerta positiva
        return redirect()->back()->with('success', '¡Producto registrado con éxito en la base de datos!');
    }
}
