<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Muestra el catálogo de productos con soporte para filtros de género y talle.
     */
    public function index(Request $request)
    {
        $query = Producto::where('activo', 1);

        if ($request->filled('genero') && $request->genero != 'Todos') {
            $query->where('genero', 'LIKE', '%' . $request->genero . '%');
        }

        if ($request->filled('talle')) {
            $query->where('talle', 'LIKE', '%' . $request->talle . '%');
        }

        $productos = $query->get();

        return view('catalogo', compact('productos'));
    }

    /**
     * Muestra la tabla de control de inventario con todos los productos cargados.
     */
    public function adminIndex()
    {
        $productos = Producto::all();
        return view('admin.readProducto', compact('productos'));
    }

    /**
     * Carga el formulario para modificar una prenda existente.
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('admin.updateProducto', compact('producto'));
    }

    /**
     * Procesa la actualización de todos los datos modificables de un producto (PUT).
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre'      => 'required|string|max:100',
            'descripcion' => 'required|string',
            'precio'      => 'required|numeric|min:0',
            'genero'      => 'required|array|min:1',
            'talle'       => 'required|array|min:1',
            'stock'       => 'required|integer|min:0',
            'url_imagen'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $producto = Producto::findOrFail($id);

        $producto->nombre      = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio      = $request->input('precio');
        $producto->stock       = $request->input('stock');

        $producto->genero = implode(', ', $request->input('genero'));
        $producto->talle  = implode(', ', $request->input('talle'));

        if ($request->hasFile('url_imagen')) {
            $imagen = $request->file('url_imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();

            // Guardamos físicamente en public/images
            $imagen->move(public_path('images'), $nombreImagen);

            // Guardamos SOLO el nombre limpio en la BD
            $producto->url_imagen = $nombreImagen;
        }

        $producto->save();

        return redirect()->route('productos.index')->with('success', '¡El producto se ha modificado y guardado con éxito!');
    }

    /**
     * Alterna el estado de activación (Baja Lógica) de un producto.
     */
    public function cambiarEstado($id)
    {
        $producto = Producto::findOrFail($id);

        if ($producto->activo == 1) {
            $producto->activo = 0;
            $mensaje = '¡Producto desactivado (baja lógica) del catálogo público!';
        } else {
            $producto->activo = 1;
            $mensaje = '¡Producto activado y visible en el catálogo nuevamente!';
        }

        $producto->save();

        return redirect()->route('productos.index')->with('success', $mensaje);
    }

    /**
     * Muestra la vista de detalle de un producto específico por su ID (Para Vista del Cliente).
     */
    public function show($id)
    {
        $producto = Producto::find($id);

        // Respaldo corregido convirtiéndolo en un objeto estándar para heredar el comportamiento
        if (!$producto && $id == 1) {
            $producto = new Producto([
                'id' => 1,
                'nombre' => 'Conjunto a Rayas',
                'precio' => 90000,
                'url_imagen' => 'default.png', // Solo el nombre
                'descripcion' => 'Este conjunto destaca por su comodidad y su diseño pinstripe atemporal en blanco y negro.',
                'genero' => 'Hombre',
                'talle' => 'M',
                'stock' => 5
            ]);
            // Forzar ID ya que es una instancia nueva no guardada
            $producto->id = 1;
        }

        if (!$producto) {
            abort(404, 'Producto no encontrado o no disponible actualmente.');
        }

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
            'activo'      => 'required',
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

            // Guardamos físicamente en public/images
            $imagen->move(public_path('images'), $nombreImagen);

            // Guardamos SOLO el nombre limpio en la BD
            $producto->url_imagen = $nombreImagen;
        } else {
            $producto->url_imagen = 'default.png';
        }

        $producto->save();

        return redirect()->back()->with('success', '¡Producto guardado exitosamente en la base de datos!');
    }

    /**
     * Muestra la tabla de compras/ventas registradas para el Administrador.
     */
    public function verCompras()
    {
        $compras = DB::table('compras')->orderBy('id', 'desc')->get();
        return view('admin.verCompras', compact('compras'));
    }
}
