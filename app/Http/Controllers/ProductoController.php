<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use App\Models\Venta; // ✨ Importación añadida para que Eloquent encuentre el modelo Venta

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
        $mensajes = [
            'nombre.required'      => 'El título del producto es obligatorio.',
            'descripcion.required' => 'La descripción de la prenda es obligatoria.',
            'precio.required'      => 'El precio es obligatorio.',
            'precio.numeric'       => 'El precio debe ser un número válido.',
            'precio.min'           => 'El precio no puede ser negativo.',
            'genero.required'      => 'Debes seleccionar al menos un género.',
            'talle.required'       => 'Debes seleccionar al menos un talle.',
            'stock.required'       => 'El stock disponible es obligatorio.',
            'stock.integer'        => 'El stock debe ser un número entero.',
            'stock.min'            => 'El stock no puede ser menor a 0.',
            'url_imagen.image'     => 'El archivo seleccionado debe ser una imagen.',
            'url_imagen.mimes'     => 'La imagen debe tener formato: jpeg, png, jpg, webp.',
            'url_imagen.max'       => 'La imagen no puede pesar más de 2MB.',
        ];

        $request->validate([
            'nombre'      => 'required|string|max:100',
            'descripcion' => 'required|string',
            'precio'      => 'required|numeric|min:0',
            'genero'      => 'required|array|min:1',
            'talle'       => 'required|array|min:1',
            'stock'       => 'required|integer|min:0',
            'url_imagen'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ], $mensajes);

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
            $imagen->move(public_path('images'), $nombreImagen);
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

        if (!$producto && $id == 1) {
            $producto = new Producto([
                'id' => 1,
                'nombre' => 'Conjunto a Rayas',
                'precio' => 90000,
                'url_imagen' => 'default.png',
                'descripcion' => 'Este conjunto destaca por su comodidad y su diseño pinstripe atemporal en blanco y negro.',
                'genero' => 'Hombre',
                'talle' => 'M',
                'stock' => 5
            ]);
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
        $mensajes = [
            'nombre.required'      => 'El nombre del producto es obligatorio.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'precio.required'      => 'El precio es obligatorio.',
            'precio.numeric'       => 'El precio debe ser un número válido.',
            'precio.min'           => 'El precio no puede ser negativo.',
            'genero.required'      => 'Debes marcar al menos un género.',
            'talle.required'       => 'Debes marcar al menos un talle.',
            'stock.required'       => 'El stock inicial es obligatorio.',
            'stock.integer'        => 'El stock debe ser un número entero.',
            'stock.min'            => 'El stock no puede ser menor a 0.',
            // Mensaje para cuando la imagen es obligatoria
            'url_imagen.required'  => 'Debes seleccionar una imagen para el producto.',
            'url_imagen.image'     => 'El archivo seleccionado debe ser una imagen.',
            'url_imagen.mimes'     => 'La imagen debe tener formato: jpeg, png, jpg, webp.',
            'url_imagen.max'       => 'La imagen no puede pesar más de 2MB.',
        ];

        $request->validate([
            'nombre'      => 'required|string|max:100',
            'descripcion' => 'required|string',
            'precio'      => 'required|numeric|min:0',
            'genero'      => 'required|array|min:1',
            'talle'       => 'required|array|min:1',
            'stock'       => 'required|integer|min:0',
            // Cambiado de nullable a required
            'url_imagen'  => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'activo'      => 'required',
        ], $mensajes);

        $producto = new Producto();
        $producto->nombre      = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio      = $request->input('precio');
        $producto->stock       = $request->input('stock');
        $producto->activo      = $request->input('activo');

        $producto->genero = implode(', ', $request->input('genero'));
        $producto->talle  = implode(', ', $request->input('talle'));

        // Como ahora es 'required', el archivo SIEMPRE existirá si pasa la validación
        if ($request->hasFile('url_imagen')) {
            $imagen = $request->file('url_imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('images'), $nombreImagen);
            $producto->url_imagen = $nombreImagen;
        }

        $producto->save();

        return redirect()->back()->with('success', '¡Producto guardado exitosamente en la base de datos!');
    }

    /**
     * Muestra la vista de compras/ventas registradas para el Administrador.
     */
    public function verCompras()
    {
        // ✨ Usa la relación Eloquent para traer el historial de ventas vinculando los desgloses de artículos
        $compras = Venta::with('detalles')->orderBy('id', 'desc')->get();

        // Enviamos los datos a la vista del administrador
        return view('admin.gestionVentas', compact('compras'));
    }
}
