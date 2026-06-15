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
})->name('consultas.index'); // Agregamos un nombre para usarlo fácilmente

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


// --- LADO ADMINISTRADOR (GESTIÓN INTERNA) ---

// 1. Ver la tabla con todas las consultas (Usa el controlador para traer los datos)
Route::get('/gestionConsultas', [ConsultaController::class, 'index'])->name('admin.consultas.index');

// 2. Procesar la respuesta del Administrador (Cambia el estado a respondido)
Route::put('/gestionConsultas/{id}/responder', [ConsultaController::class, 'responder'])->name('admin.consultas.responder');

// Tabla de control de inventario (Productos)
Route::get('/readProducto', [ProductoController::class, 'adminIndex'])->name('productos.index');

// Guardar nuevo producto
Route::post('/guardar-producto', [ProductoController::class, 'guardar'])->name('productos.guardar');

// Formulario de edición para el Administrador
Route::get('/updateProducto/{id}', [ProductoController::class, 'edit'])->name('productos.edit');

// Procesamiento de la actualización de datos (PUT)
Route::put('/updateProducto/{id}', [ProductoController::class, 'update'])->name('productos.update');

// Acción de baja lógica (PATCH)
Route::patch('/productos/{id}/estado', [ProductoController::class, 'cambiarEstado'])->name('productos.estado');

// Ver tabla de ventas/compras para el Administrador
Route::get('/admin/compras', [ProductoController::class, 'verCompras'])->name('admin.compras');

// Ver tabla de usuarios registrados (Mapeado a /verUsuarios)
Route::get('/verUsuarios', [ProductoController::class, 'verUsuarios'])->name('admin.usuarios');


// --- PROCESAMIENTO DE FORMULARIOS (POST) ---

Route::post('/contacto', [ContactoController::class, 'procesar']);
Route::post('/consultas', [ConsultaController::class, 'store'])->name('consultas.store');
Route::post('/enviar-consulta', [ConsultaController::class, 'store']);
Route::post('/crear-cuenta', [RegistroController::class, 'procesar'])->name('cuenta.procesar');


// --- AUTENTICACIÓN (LOGIN Y LOGOUT) ---

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/registro', function () {
    return view('registro');
});

// Procesamiento de login y logout
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// --- CARRITO DE COMPRAS ---

Route::get('/carrito', [CarritoController::class, 'ver'])->name('carrito.ver');
Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::post('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::post('/carrito/comprar', [CarritoController::class, 'procesarCompra'])->name('carrito.comprar');
