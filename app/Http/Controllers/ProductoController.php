<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function guardar(Request $request)
    {
        // 1. Validar
        $request->validate([
            'titulo' => 'required|string|max:100',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
        ]);

        // 2. Mapear con la DB real (Pusimos solo las columnas reales de tu phpMyAdmin)
        $producto = new Producto();
        $producto->nombre = $request->input('titulo');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio');
        $producto->stock = 1;
        $producto->url_imagen = 'default.png';

        // 3. Guardar (Ahora sí va a funcionar porque todas las columnas existen)
        $producto->save();

        // 4. Volver atrás con mensaje
        return redirect()->back()->with('success', '¡Producto guardado exitosamente!');
    }
}
