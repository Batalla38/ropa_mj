<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\LoginController; //  Conectado directamente a la carpeta Controllers
use App\Http\Controllers\ProductoController;

// --- VISTAS PRINCIPALES Y CATÁLOGOS ---

use App\Http\Controllers\ConsultaController;


use App\Http\Controllers\RegistroController;
Route::get('/main', function () {
    return view('main');
})->name('main'); //  El LoginController usa este nombre para redireccionarte acá

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/main', function () {
    return view('main');
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


// Catálogos
Route::get('/catalogo', function () {
    return view('catalogo');
});

Route::post('/consultas', [App\Http\Controllers\ConsultaController::class, 'store']);


Route::get('/catalogoM', function () {
    return view('catalogoM');
});

Route::get('/catalogoF', function () {
    return view('catalogoF');
});

Route::get('/catalogoChaleco', function () {
    return view('catalogoChaleco');
});

// Productos
Route::get('/producto', function () {
    return view('producto');
});

Route::get('/productoM', function () {
    return view('productoM');
});

// --- LADO ADMINISTRADOR ---
Route::get('/gestionConsultas', function () {
    return view('admin.gestionConsultas');
});
Route::get('/createProducto', function () {
    return view('admin.createProducto');
});
Route::get('/updateProducto', function () {
    return view('admin.updateProducto');
});
Route::get('/readProducto', function () {
    return view('admin.readProducto');
});

Route::post('/guardar-producto', [ProductoController::class, 'guardar'])->name('productos.guardar');

// --- PROCESAMIENTO DE FORMULARIOS (POST) ---

// Formulario de Contacto
Route::post('/contacto', [ContactoController::class, 'procesar']);

// Formulario de Registro de cuenta
Route::post('/crear-cuenta', [RegistroController::class, 'procesar'])->name('cuenta.procesar');


// --- AUTENTICACIÓN (LOGIN Y LOGOUT) ---

// Mostrar las pantallas (GET)
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/registro', function () {
    return view('registro');
});

// Capturar los datos del Login e iniciar sesión
Route::post('/login', [LoginController::class, 'store'])->name('login.store');


// NUEVA: Ruta necesaria para poder cerrar sesión cuando quieras salír
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



//use App\Http\Controllers\registroController;

// El truco está en el ->name() del final
Route::post('/crear-cuenta', [registroController::class, 'procesar'])->name('cuenta.procesar');
return redirect()->back()->with('status', '¡Tu cuenta ha sido creada con éxito!');


Route::post('/enviar-consulta', [App\Http\Controllers\ConsultaController::class, 'store']);





//Route::any('/consultas', [App\Http\Controllers\ConsultaController::class, 'store']);
