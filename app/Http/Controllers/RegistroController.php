<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class registroController extends Controller
{
    public function procesar(Request $request)
{
    // 1. VALIDACIÓN
    $request->validate([
        'nombre'     => 'required|string|max:50',
        'apellido'   => 'required|string|max:50',
        'correo'     => 'required|email|unique:usuarios,correo', 
        'contraseña' => 'required|string|min:8|max:20', 
    ], [
        'correo.unique'       => 'Este correo electrónico ya está registrado.',
        'contraseña.required' => 'La contraseña es obligatoria.',
    ]);

    // 2. GUARDADO DIRECTO USANDO EL MODELO
    // (Esto funciona perfectamente gracias al $fillable que configuramos arriba)
    Usuario::create([
        'nombre'     => $request->input('nombre'),
        'apellido'   => $request->input('apellido'),
        'id_rol'     => 2, // <--- Aquí le mandamos el 2 de forma obligatoria
        'correo'     => $request->input('correo'),
        'contraseña' => bcrypt($request->input('contraseña')), 
    ]);

    // 3. REDIRECCIÓN
    return redirect()->back()->with('status', '¡Tu cuenta ha sido creada con éxito!');
}
}