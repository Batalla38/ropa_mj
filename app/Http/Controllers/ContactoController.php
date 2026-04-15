<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function procesar(Request $request)
    {
        // Capturamos los datos usando los 'name' del formulario
        $nombre = $request->input('nombre');
        $email = $request->input('email');

        // Retornamos la vista 'exito' pasando los valores en un arreglo
        return view('exito', [
            'nombre' => $nombre,
            'email' => $email
        ]);
}
}
