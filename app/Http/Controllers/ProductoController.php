<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Muestra el catálogo de productos con soporte para filtros de género y talle.
     * Si no hay filtros aplicados, muestra todos los productos activos.
     * ACCESO: Clientes públicos -> Vista: 'catalogo'
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
     * ACCESO: Administrador -> Vista: 'admin.readProducto'
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
     * El ID y el Estado de Activación quedan resguardados de alteraciones directas aquí.
     */
    public function update(Request $request, $id)
    {
        // 1. Validar rigurosamente los campos requeridos del formulario
        $request->validate([
            'nombre'      => 'required|string|max:100',
            'descripcion' => 'required|string',
            'precio'      => 'required|numeric|min:0',
            'genero'      => 'required|array|min:1',
            'talle'       => 'required|array|min:1',
            'stock'       => 'required|integer|min:0',
            'url_imagen'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // 2. Localizar el producto original
        $producto = Producto::findOrFail($id);

        // 3. Asignar los nuevos valores correspondientes
        $producto->nombre      = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio      = $request->input('precio');
        $producto->stock       = $request->input('stock');

        // Normalizamos los elementos de los arrays uniéndolos por comas antes de guardar
        $producto->genero = implode(', ', $request->input('genero'));
        $producto->talle  = implode(', ', $request->input('talle'));

        // 4. Procesar y almacenar imagen física en la carpeta pública en caso de subirse una nueva
        if ($request->hasFile('url_imagen')) {
            $imagen = $request->file('url_imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('images'), $nombreImagen);
            $producto->url_imagen = 'images/' . $nombreImagen;
        }

        // 5. Guardar definitivamente los cambios en la base de datos
        $producto->save();

        // Redirecciona al listado del Administrador (readProducto) con el cartel de éxito
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
     * Muestra la vista de detalle de un producto específico por su ID (Para Clientes).
     */
    public function show($id)
    {
        $producto = Producto::where('id', $id)->where('activo', 1)->first();

        if (!$producto && $id == 1) {
            $producto = (object) [
                'id' => 1,
                'nombre' => 'Conjunto a Rayas',
                'precio' => 90000,
                'url_imagen' => 'ropa Hombre/ConjuntoRayasH.jpg',
                'descripcion' => 'Este conjunto destaca por su comodidad y su diseño pinstripe atemporal en blanco y negro.',
                'material' => 'Lino de alta calidad',
                'patron' => 'Rayas finas (pinstripe) blanco y negro',
                'cuidado' => 'Lavado a máquina en frío.'
            ];
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
            $imagen->move(public_path('images'), $nombreImagen);
            $producto->url_imagen = 'images/' . $nombreImagen;
        } else {
            $producto->url_imagen = 'images/default.png';
        }

        $producto->save();

        return redirect()->back()->with('success', '¡Producto guardado exitosamente en la base de datos!');
    }
}
