<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;

Route::get('/main', function () {
    return view('main');
});

Route::get('/contacto', function () {
    return view('contacto');
});

Route::get('/productos', function () {
    return view('productos');
});

Route::post('/contacto', [ContactoController::class, 'procesar']);
