<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function guardar(Request $request)
    {
        // 1. Validar los datos solicitados
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

        // 2. Crear la instancia del Modelo y asignar valores
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

        // 3. Gestionar la subida del archivo de imagen
        if ($request->hasFile('url_imagen')) {
            $imagen = $request->file('url_imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('images'), $nombreImagen); // Se guarda en public/images/
            $producto->url_imagen = $nombreImagen;
        } else {
            $producto->url_imagen = 'default.png'; // Imagen comodín por defecto
        }

        // 4. Guardar directamente en phpMyAdmin
        $producto->save(); // <--- ¡ESTA ES LA LÍNEA MÁGICA QUE TE FALTA!

        // 5. Volver atrás informando el éxito
        return redirect()->back()->with('success', '¡Producto guardado exitosamente en la base de datos!');
    }
}
