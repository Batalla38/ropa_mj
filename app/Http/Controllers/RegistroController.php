<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class registroController extends Controller
{
    public function procesar(Request $request)
    {
        // 1. VALIDACIÓN: Mapeada con los nombres exactos de tu Blade ('correo' y 'contraseña')
        $request->validate([
            'nombre'     => 'required|string|max:50',
            'apellido'   => 'required|string|max:50',
            'correo'     => 'required|email|unique:usuarios,correo', 
            'contraseña' => 'required|string|min:8|max:20', 
        ], [
            'correo.unique'       => 'Este correo electrónico ya está registrado.',
            'contraseña.required' => 'La contraseña es obligatoria.',
        ]);

        // 2. GUARDADO: Mapeado con las columnas exactas de tu phpMyAdmin
        $usuario = new Usuario();
        $usuario->nombre     = $request->input('nombre');
        $usuario->apellido   = $request->input('apellido');
        $usuario->correo     = $request->input('correo');
        $usuario->contraseña = $request->input('contraseña'); // Encripta capturando 'contraseña'
        
        $usuario->save(); 

        // 3. REDIRECCIÓN: Limpia el formulario y muestra el cartel verde
        return redirect()->back()->with('status', '¡Tu cuenta ha sido creada con éxito!');
    }
}