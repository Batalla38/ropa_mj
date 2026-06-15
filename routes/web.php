<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\CarritoController;

// --- VISTAS PRINCIPALES (RETORNO DIRECTO A TU VISTA 'main') ---

// Tanto la raíz como '/main' ahora cargan la vista directa sin pasar por el controlador
Route::get('/', function () {
    return view('main');
})->name('main.home');

Route::get('/main', function () {
    return view('main');
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


// --- LADO ADMINISTRADOR (GESTIÓN DE INVENTARIO - SE MANTIENE INTACTO) ---

// Muestra el formulario para cargar un nuevo producto (Solución al Error 404 al presionar el botón)
Route::get('/createProducto', function () {
    return view('admin.createProducto');
})->name('productos.create');

// Guardar nuevo producto
Route::post('/guardar-producto', [ProductoController::class, 'guardar'])->name('productos.guardar');

// Tabla de control de inventario
Route::get('/readProducto', [ProductoController::class, 'adminIndex'])->name('productos.index');

// Formulario de edición para el Administrador
Route::get('/updateProducto/{id}', [ProductoController::class, 'edit'])->name('productos.edit');

// Procesamiento de la actualización de datos (PUT)
Route::put('/updateProducto/{id}', [ProductoController::class, 'update'])->name('productos.update');

// Acción de baja lógica (PATCH)
Route::patch('/productos/{id}/estado', [ProductoController::class, 'cambiarEstado'])->name('productos.estado');

// Ver tabla de ventas/compras para el Administrador
Route::get('/admin/compras', [ProductoController::class, 'verCompras'])->name('admin.compras');

// Ver tabla de usuarios registrados
Route::get('/verUsuarios', [ProductoController::class, 'verUsuarios'])->name('admin.usuarios');


// --- PROCESAMIENTO DE FORMULARIOS (POST) ---

Route::post('/contacto', [ContactoController::class, 'procesar']);
Route::post('/consultas', [ConsultaController::class, 'store'])->name('consultas.store');
Route::post('/enviar-consulta', [ConsultaController::class, 'store']);
Route::post('/crear-cuenta', [RegistroController::class, 'procesar'])->name('cuenta.procesar');

Route::get('/gestionConsultas', [ConsultaController::class, 'index'])->name('admin.consultas.index');
Route::post('/gestionConsultas/{id}/responder', [ConsultaController::class, 'responder'])->name('admin.consultas.responder');


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
