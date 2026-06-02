<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\AdminConsultaController; // <-- CORREGIDO: Sin la "s"

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- VISTAS PRINCIPALES Y PÁGINAS PÚBLICAS ---

Route::get('/main', function () {
    return view('main');
})->name('main'); // El LoginController usa este nombre para redireccionarte acá

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

// --- CATÁLOGOS Y PRODUCTOS ---

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

Route::get('/producto', function () {
    return view('producto');
});

Route::get('/productoM', function () {
    return view('productoM');
});


// --- AUTENTICACIÓN (LOGIN Y LOGOUT) ---

// Mostrar las pantallas (GET)
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/registro', function () {
    return view('registro');
});

// Procesar inicio y cierre de sesión
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// --- PROCESAMIENTO DE FORMULARIOS DEL CLIENTE (POST) ---

// Formulario de Contacto básico
Route::post('/contacto', [ContactoController::class, 'procesar']);

// Formulario de Registro de cuenta (CORREGIDO: Se eliminó el código duplicado y el return suelto)
Route::post('/crear-cuenta', [RegistroController::class, 'procesar'])->name('cuenta.procesar');

// Envío de consultas de los clientes (Ambas opciones apuntan al controlador)
Route::post('/consultas', [ConsultaController::class, 'store']);
Route::post('/enviar-consulta', [ConsultaController::class, 'store']);


// --- PANEL DE ADMINISTRACIÓN (GESTIÓN DE CONSULTAS) ---

// Cambiamos a la URL definitiva que querías usar para ver adminConsultas.blade.phpRoute::get('/admin/adminConsultas', [AdminConsultasController::class, 'index'])->name('admin.consultas.index');
// Rutas del final


// Rutas finales en singular
Route::get('/admin/adminConsultas', [AdminConsultaController::class, 'index'])->name('admin.consultas.index');
// Asegurate de que tu ruta en web.php esté escrita exactamente así:
Route::put('/adminConsultas/{id}', [AdminConsultaController::class, 'responder'])->name('admin.consultas.responder');