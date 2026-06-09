<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    // 1. Listar todos los productos (Vista de administración)
    public function index()
    {
        $productos = Producto::all();
        return view('admin.readProducto', compact('productos'));
    }

    // 2. Guardar un producto nuevo
    public function guardar(Request $request)
    {
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

        $producto = new Producto();
        $producto->nombre      = $request->input('titulo');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio      = $request->input('precio');
        $producto->stock       = $request->input('stock');
        $producto->activo      = $request->input('activo');

        $producto->genero = implode(', ', $request->input('generos'));
        $producto->talle  = implode(', ', $request->input('talles'));

        if ($request->hasFile('url_imagen')) {
            $imagen = $request->file('url_imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('images'), $nombreImagen);
            $producto->url_imagen = $nombreImagen;
        } else {
            $producto->url_imagen = 'default.png';
        }

        $producto->save();

        return redirect()->back()->with('success', '¡Producto guardado exitosamente!');
    }

    // 3. Buscar el producto por ID y cargar el formulario de edición
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('admin.updateProducto', compact('producto'));
    }

    // 4. Procesar el formulario de edición y guardar cambios
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo'      => 'required|string|max:100',
            'descripcion' => 'required|string',
            'precio'      => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->nombre      = $request->input('titulo');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio      = $request->input('precio');
        $producto->stock       = $request->input('stock');

        if ($request->hasFile('url_imagen')) {
            $imagen = $request->file('url_imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('images'), $nombreImagen);
            $producto->url_imagen = $nombreImagen;
        }

        $producto->save();

        return redirect()->route('productos.index')->with('success', '¡Producto actualizado con éxito!');
    }

    // 5. Baja lógica: Alternar el estado activo entre 1 y 0
    public function cambiarEstado($id)
    {
        $producto = Producto::findOrFail($id);

        // Si el estado es 1 cambia a 0, si es 0 vuelve a 1
        $producto->activo = $producto->activo == 1 ? 0 : 1;
        $producto->save();

        return redirect()->back();
    }

} // <-- Esta llave ÚNICA cierra la clase completa y encierra todos los métodos.
