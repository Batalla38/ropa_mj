<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;

Route::get('/main', function () {
    return view('main');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/catalogo', function () {
    return view('catalogo');
});

//<<<<<<< HEAD
//=======
Route::get('/quienesSomos', function () {
    return view('quienesSomos');
});

Route::get('/metodosDePago', function () {
    return view('metodosDePago');
});

//>>>>>>> 11dcd97addb0124dfd833a0ec156ed6724352eb9
Route::get('/producto', function () {
    return view('producto');
});
Route::get('/productoM', function () {
    return view('productoM');
});

//<<<<<<< HEAD
Route::post('/contacto', [ContactoController::class, 'procesar']);
//=======
Route::get('/catalogo', function () {
    return view('catalogo');
});
Route::get('/terminosYCondiciones', function () {
    return view('terminosYCondiciones');
});
Route::get('/consultas', function () {
    return view('consultas');
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
Route::get('/productoM', function () {
    return view('productoM');
});
//>>>>>>> 11dcd97addb0124dfd833a0ec156ed6724352eb9
