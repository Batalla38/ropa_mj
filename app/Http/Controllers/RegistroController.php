<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario; // Importación para que VS Code no lo marque en rojo

class registroController extends Controller
{
    public function procesar(Request $request)
    {
        // 1. VALIDACIÓN DEL FORMULARIO
        $request->validate([
            'nombre'   => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'correo'   => 'required|email|unique:usuarios,correo', 
            // Validamos 'password' y exigimos que coincida con 'password_confirmation'
            'password' => 'required|string|min:8|max:20|confirmed', 
        ], [
            'correo.unique'     => 'Este correo electrónico ya está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed'=> 'Las contraseñas no coinciden. Por favor, verifícalas.',
        ]);

        // 2. GUARDADO EN LA BASE DE DATOS
        Usuario::create([
            'nombre'     => $request->input('nombre'),
            'apellido'   => $request->input('apellido'),
            'id_rol'     => 2, // Se asigna el rol de forma obligatoria
            'correo'     => $request->input('correo'),
            // 'contraseña' apunta a tu BD, y mapea el input 'password' del formulario
            'contraseña' => bcrypt($request->input('password')), 
        ]);

        // 3. REDIRECCIÓN CON MENSAJE DE ÉXITO
        return redirect()->back()->with('status', '¡Tu cuenta ha sido creada con éxito!');
    }
}