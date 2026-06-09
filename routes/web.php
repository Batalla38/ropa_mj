<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\CarritoController;

// --- VISTAS PRINCIPALES ---

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

Route::get('/consultas', function () {
    return view('consultas');
});

// --- CATÁLOGOS ---
Route::get('/catalogo', function () {
    return view('catalogo');
});

Route::get('/catalogoM', function () {
    return view('catalogoM');
});

Route::get('/catalogoF', function () {
    return view('catalogoF');
});

Route::get('/catalogoChaleco', function () {
    return view('catalogoChaleco');
});

// --- PRODUCTOS INDIVIDUALES (DETALLE) ---

Route::get('/producto/{id}', function ($id) {
    return view('producto');
})->name('productos.mostrar');

Route::get('/producto', function () {
    return view('producto');
});

// --- LADO ADMINISTRADOR (GESTIÓN DE PRODUCTOS) ---

Route::get('/gestionConsultas', function () {
    return view('admin.gestionConsultas');
});

Route::get('/createProducto', function () {
    return view('admin.createProducto');
});

// Lector general de productos
Route::get('/readProducto', [ProductoController::class, 'index'])->name('productos.index');

// Guardar nuevo producto
Route::post('/guardar-producto', [ProductoController::class, 'guardar'])->name('productos.guardar');

// Formulario de edición (Carga los datos pasándole el ID en la URL)
Route::get('/updateProducto/{id}', [ProductoController::class, 'edit'])->name('productos.edit');

// Procesamiento de la actualización de datos (PUT)
Route::put('/updateProducto/{id}', [ProductoController::class, 'update'])->name('productos.update');

// Acción de baja lógica (PATCH para alternar estado activo 1 o 0)
Route::patch('/productos/{id}/estado', [ProductoController::class, 'cambiarEstado'])->name('productos.estado');


// --- PROCESAMIENTO DE FORMULARIOS (POST) ---

Route::post('/contacto', [ContactoController::class, 'procesar']);
Route::post('/consultas', [ConsultaController::class, 'store']);
Route::post('/enviar-consulta', [ConsultaController::class, 'store']);
Route::post('/crear-cuenta', [RegistroController::class, 'procesar'])->name('cuenta.procesar');


// --- AUTENTICACIÓN (LOGIN Y LOGOUT) ---

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/registro', function () {
    return view('registro');
});

Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas para cualquier usuario (Visitante o Registrado)
Route::get('/carrito', [CarritoController::class, 'ver'])->name('carrito.ver');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::post('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');

// Ruta para procesar la compra (Protegida, redirige al login si no está logueado)
Route::post('/carrito/comprar', [CarritoController::class, 'procesarCompra'])->name('carrito.comprar');
