<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\CarritoController;
use App\Models\Producto;

// --- VISTAS PRINCIPALES (MODIFICADO: Ahora cargan los productos para la página principal) ---

Route::get('/', function () {
    // Tomamos 4 productos activos al azar o los últimos cargados para la sección destacados
    $destacados = Producto::where('activo', 1)->latest()->take(4)->get();

    // Filtramos productos que contengan 'Hombre' o 'Masculino' en su atributo género
    $productosHombre = Producto::where('activo', 1)
        ->where(function($query) {
            $query->where('genero', 'LIKE', '%Hombre%')
                  ->orWhere('genero', 'LIKE', '%Masculino%');
        })->take(4)->get();

    // Filtramos productos que contengan 'Mujer' o 'Femenino' en su atributo género
    $productosMujer = Producto::where('activo', 1)
        ->where(function($query) {
            $query->where('genero', 'LIKE', '%Mujer%')
                  ->orWhere('genero', 'LIKE', '%Femenino%');
        })->take(4)->get();

    return view('main', compact('destacados', 'productosHombre', 'productosMujer'));
})->name('main.home');

Route::get('/main', function () {
    $destacados = Producto::where('activo', 1)->latest()->take(4)->get();

    $productosHombre = Producto::where('activo', 1)
        ->where(function($query) {
            $query->where('genero', 'LIKE', '%Hombre%')
                  ->orWhere('genero', 'LIKE', '%Masculino%');
        })->take(4)->get();

    $productosMujer = Producto::where('activo', 1)
        ->where(function($query) {
            $query->where('genero', 'LIKE', '%Mujer%')
                  ->orWhere('genero', 'LIKE', '%Femenino%');
        })->take(4)->get();

    return view('main', compact('destacados', 'productosHombre', 'productosMujer'));
})->name('main');

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/quienesSomos', function () {
    return view('quienesSomos');
});

Route::get('/metodosDePago', function () {
    return view('metodosDePago');
});

Route::get('/terminosYCondiciones', function () {
    return view('terminosYCondiciones');
});

Route::get('/consultas', function () { return view('consultas'); });
Route::post('/consultas', [ConsultaController::class, 'store']);


// --- CATÁLOGOS PÚBLICOS ---

Route::get('/catalogo', [ProductoController::class, 'index'])->name('catalogo.index');

Route::get('/catalogoM', function () {
    return view('catalogoM');
});

Route::get('/catalogoF', function () {
    return view('catalogoF');
});

Route::get('/catalogoChaleco', function () {
    return view('catalogoChaleco');
});


// --- PRODUCTOS INDIVIDUALES (DETALLE DE INTERFAZ ÚNICA PARA CLIENTES) ---
Route::get('/producto/{id}', [ProductoController::class, 'show'])->name('producto.show');

Route::get('/historial', [CarritoController::class, 'historial'])->name('carrito.historial');
// --- LADO ADMINISTRADOR (GESTIÓN DE INVENTARIO - SE MANTIENE INTACTO) ---

Route::get('/gestionVentas', [ProductoController::class, 'verCompras'])->name('admin.compras.index');

Route::get('/createProducto', function () {
    return view('admin.createProducto');
})->name('productos.create');

Route::post('/guardar-producto', [ProductoController::class, 'guardar'])->name('productos.guardar');

Route::get('/readProducto', [ProductoController::class, 'adminIndex'])->name('productos.index');

Route::get('/updateProducto/{id}', [ProductoController::class, 'edit'])->name('productos.edit');

Route::put('/updateProducto/{id}', [ProductoController::class, 'update'])->name('productos.update');

Route::patch('/productos/{id}/estado', [ProductoController::class, 'cambiarEstado'])->name('productos.estado');

Route::get('/admin/compras', [ProductoController::class, 'verCompras'])->name('admin.compras');

Route::get('/verUsuarios', [ProductoController::class, 'verUsuarios'])->name('admin.usuarios');


// --- PROCESAMIENTO DE FORMULARIOS (POST) ---

Route::post('/contacto', [ContactoController::class, 'procesar']);
Route::post('/consultas', [ConsultaController::class, 'store'])->name('consultas.store');
Route::post('/enviar-consulta', [ConsultaController::class, 'store']);
Route::post('/crear-cuenta', [RegistroController::class, 'procesar'])->name('cuenta.procesar');

Route::get('/gestionConsultas', [ConsultaController::class, 'index'])->name('admin.consultas.index');
Route::post('/gestionConsultas/{id}/responder', [ConsultaController::class, 'responder'])->name('admin.consultas.responder');

// Cambiamos la URL a /pago y el nombre de la ruta a 'carrito.pago'
Route::get('/pago', [CarritoController::class, 'checkout'])->name('carrito.pago');

// Ruta POST para recibir el formulario que llena el cliente
Route::post('/procesar-pago', [CarritoController::class, 'procesarPago'])->name('carrito.procesarPago');

// Ruta GET para mostrar la pantalla final de éxito
Route::get('/compra-exitosa', [CarritoController::class, 'compraExitosa'])->name('carrito.exito');

// --- AUTENTICACIÓN (LOGIN Y LOGOUT) ---

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/registro', function () {
    return view('registro');
});

Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// --- CARRITO DE COMPRAS ---

Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::post('/carrito/restar/{id}', [CarritoController::class, 'restar'])->name('carrito.restar');
Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::get('/carrito/vaciar', [CarritoController::class, 'vaciar'])->name('carrito.vaciar');
