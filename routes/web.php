<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\CarritoController;
use App\Models\Producto;

// --- VISTAS PRINCIPALES ---

Route::get('/', function () {
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

// ✨ CONSULTAS PÚBLICAS REFORMULADAS: Ahora sí conectan con el controlador dinámico
Route::get('/consultas', [ConsultaController::class, 'mostrarFaq'])->name('consultas.index');
Route::post('/consultas', [ConsultaController::class, 'store'])->name('consultas.store');
Route::get('/misConsultas', [ConsultaController::class, 'misConsultas'])->name('usuario.consultas.historial');


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


// --- PRODUCTOS INDIVIDUALES & HISTORIALES ---
Route::get('/producto/{id}', [ProductoController::class, 'show'])->name('producto.show');
Route::get('/historial', [CarritoController::class, 'historial'])->name('carrito.historial');


// --- LADO ADMINISTRADOR (GESTIÓN DE INVENTARIO Y VENTAS) ---

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


// --- LADO ADMINISTRADOR (GESTIÓN DE CONSULTAS) ---
Route::get('/gestionConsultas', [ConsultaController::class, 'index'])->name('admin.consultas.index');
Route::post('/gestionConsultas/{id}/responder', [ConsultaController::class, 'responder'])->name('admin.consultas.responder');


// --- PROCESAMIENTO DE FORMULARIOS CLIENTE (POST Y PROCESOS) ---

Route::post('/contacto', [ContactoController::class, 'procesar']);
Route::post('/crear-cuenta', [RegistroController::class, 'procesar'])->name('cuenta.procesar');

Route::get('/pago', [CarritoController::class, 'checkout'])->name('carrito.pago');
Route::post('/procesar-pago', [CarritoController::class, 'procesarPago'])->name('carrito.procesarPago');
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
