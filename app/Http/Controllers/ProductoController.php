<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Fachada DB para consultas rápidas si fueran necesarias
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
        // Comenzamos la consulta trayendo solo los productos que estén activos (1)
        $query = Producto::where('activo', 1);

        // Filtro por Género (Si se selecciona algo distinto a "Todos")
        if ($request->filled('genero') && $request->genero != 'Todos') {
            // Buscamos coincidencia parcial ya que se guardan como strings ("Masculino, Femenino")
            $query->where('genero', 'LIKE', '%' . $request->genero . '%');
        }

        // Filtro por Talle (X o XL)
        if ($request->filled('talle')) {
            $query->where('talle', 'LIKE', '%' . $request->talle . '%');
        }

        // Obtenemos los productos finales filtrados de la base de datos
        $productos = $query->get();

        // Enviamos los productos a la vista del catálogo público
        return view('catalogo', compact('productos'));
    }

    /**
     * Muestra la tabla de control de inventario con todos los productos cargados.
     * ACCESO: Administrador -> Vista: 'admin.readProducto'
     */
    public function adminIndex()
    {
        // Traemos absolutamente todos los productos de la BD (activos e inactivos)
        $productos = Producto::all();

        // Enviamos la colección a la vista exclusiva de administración interna
        return view('admin.readProducto', compact('productos'));
    }

    /**
     * Carga el formulario para modificar una prenda existente.
     * Pasa el producto en singular para evitar el error de variable indefinida.
     */
    public function edit($id)
    {
        // Busca el producto por su ID o arroja un error 404 si no existe
        $producto = Producto::findOrFail($id);

        // Retorna la vista pasando la variable correcta en singular
        return view('admin.updateProducto', compact('producto'));
    }

    /**
     * Procesa la actualización de los datos de un producto en la base de datos (PUT).
     */
    public function update(Request $request, $id)
    {
        // 1. Validar los datos del formulario de edición
        $request->validate([
            'nombre'      => 'required|string|max:100',
            'descripcion' => 'required|string',
            'precio'      => 'required|numeric|min:0',
            'genero'      => 'required|array',
            'talle'       => 'required|array',
            'stock'       => 'required|integer|min:0',
            'url_imagen'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // 2. Buscar el registro existente
        $producto = Producto::findOrFail($id);
        $producto->nombre      = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio      = $request->input('precio');
        $producto->stock       = $request->input('stock');

        // Volver a transformar los arrays de checkboxes a texto plano para guardar en BD
        $producto->genero = implode(', ', $request->input('genero'));
        $producto->talle  = implode(', ', $request->input('talle'));

        // 3. Procesar nueva imagen si el usuario subió una
        if ($request->hasFile('url_imagen')) {
            $imagen = $request->file('url_imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('images'), $nombreImagen);
            $producto->url_imagen = 'images/' . $nombreImagen;
        }

        // 4. Guardar cambios en PHPMyAdmin
        $producto->save();

        return redirect()->route('productos.index')->with('success', '¡Producto actualizado correctamente!');
    }

    /**
     * Alterna el estado de activación (Baja Lógica) de un producto.
     */
    public function cambiarEstado($id)
    {
        // Buscamos la prenda por su ID único
        $producto = Producto::findOrFail($id);

        // Invertimos el estado binario (si es 1 pasa a 0, si es 0 pasa a 1)
        if ($producto->activo == 1) {
            $producto->activo = 0;
            $mensaje = '¡Producto desactivado (baja lógica) del catálogo público!';
        } else {
            $producto->activo = 1;
            $mensaje = '¡Producto activado y visible en el catálogo nuevamente!';
        }

        // Guardamos los cambios en la base de datos
        $producto->save();

        // Redireccionamos al panel de control con el aviso correspondiente
        return redirect()->route('productos.index')->with('success', $mensaje);
    }

    /**
     * Muestra la vista de detalle de un producto específico por su ID (Para Clientes).
     */
    public function show($id)
    {
        $producto = Producto::where('id', $id)->where('activo', 1)->first();

        // Simulación de pruebas si la base de datos está vacía para el ID 1
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
        // 1. VALIDAR CAMPOS
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

        // 2. MAPEAR DATOS CON EL MODELO
        $producto = new Producto();
        $producto->nombre      = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio      = $request->input('precio');
        $producto->stock       = $request->input('stock');
        $producto->activo      = $request->input('activo');

        $producto->genero = implode(', ', $request->input('genero'));
        $producto->talle  = implode(', ', $request->input('talle'));

        // 3. GUARDAR IMAGEN FÍSICA
        if ($request->hasFile('url_imagen')) {
            $imagen = $request->file('url_imagen');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $imagen->move(public_path('images'), $nombreImagen);
            $producto->url_imagen = 'images/' . $nombreImagen;
        } else {
            $producto->url_imagen = 'images/default.png';
        }

        // 4. GUARDAR DIRECTAMENTE EN LA BD
        $producto->save();

        return redirect()->back()->with('success', '¡Producto guardado exitosamente en la base de datos!');
    }
}
