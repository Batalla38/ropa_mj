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

Route::get('/quienesSomos', function () {
    return view('quienesSomos');
})->name('quienes.somos');


