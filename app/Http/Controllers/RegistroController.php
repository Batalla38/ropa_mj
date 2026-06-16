<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class registroController extends Controller
{
    public function procesar(Request $request)
    {
        // 1. VALIDACIÓN DEL FORMULARIO CON MENSAJES 100% EN ESPAÑOL
        $request->validate([
            'nombre'   => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'correo'   => 'required|email|unique:usuarios,correo', 
            'password' => 'required|string|min:8|max:20|confirmed', 
        ], [
            // Mensajes para el Nombre
            'nombre.required'   => 'El campo nombre es obligatorio.',
            'nombre.max'        => 'El nombre no puede tener más de 50 caracteres.',
            
            // Mensajes para el Apellido
            'apellido.required' => 'El campo apellido es obligatorio.',
            'apellido.max'      => 'El apellido no puede tener más de 50 caracteres.',
            
            // Mensajes para el Correo
            'correo.required'   => 'El correo electrónico es obligatorio.',
            'correo.email'      => 'Por favor, ingresa un correo electrónico válido.',
            'correo.unique'     => 'Este correo electrónico ya está registrado.',
            
            // Mensajes para la Contraseña
            'password.required' => 'La contraseña es obligatoria.',
            'password.min'      => 'La contraseña debe tener al menos 8 caracteres.',
            'password.max'      => 'La contraseña no puede tener más de 20 caracteres.',
            'password.confirmed'=> 'Las contraseñas no coinciden. Por favor, verifícalas.',
        ]);

        // 2. GUARDADO EN LA BASE DE DATOS
        $nuevoUsuario = Usuario::create([
            'nombre'     => $request->input('nombre'),
            'apellido'   => $request->input('apellido'),
            'id_rol'     => 2, // Se asigna el rol de cliente de forma obligatoria
            'correo'     => $request->input('correo'),
            'contraseña' => bcrypt($request->input('password')), 
        ]);

        // --- LOGIN AUTOMÁTICO RESPALDANDO EL CARRITO ---
        
        // 1. Respaldamos el carrito que armó como visitante
        $carritoRespaldo = $request->session()->get('carrito', []);

        // 2. Le creamos la sesión manual usando los datos del usuario recién creado
        $request->session()->put('user_id', $nuevoUsuario->id_usuario); 
        $request->session()->put('id_rol', $nuevoUsuario->id_rol);
        $request->session()->put('user_name', $nuevoUsuario->nombre);

        // 3. Le devolvemos el carrito a su nueva sesión activa
        if (!empty($carritoRespaldo)) {
            $request->session()->put('carrito', $carritoRespaldo);
            
            // Si tenía ropa cargada, lo mandamos directo al carrito a finalizar la compra
            return redirect('/carrito')->with('status', '¡Cuenta creada con éxito! Aquí tienes tus productos listos para comprar.');
        }

        // 3. REDIRECCIÓN SI EL CARRITO ESTABA VACÍO
        return redirect('/main')->with('status', '¡Tu cuenta ha sido creada con éxito! Bienvenido a Ropa MJ.');
    }
}