<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Si vas a guardar el usuario en la base de datos, descomenta la siguiente línea:
// use App\Models\User;

class registroController extends Controller
{
    public function procesar(Request $request)
    {
        // 1. Validamos los datos que llegan del formulario (coinciden exactamente con tu HTML)
        $datosValidados = $request->validate([
            'nombre'   => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|max:20|regex:/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]+$/',
        ], [
            // Mensajes personalizados en español
            'email.unique'   => 'Este correo electrónico ya está registrado.',
            'password.regex' => 'La contraseña debe contener letras y números, sin espacios ni caracteres especiales.',
        ]);

        // 2. Si la validación pasa, capturamos los datos en tus nuevas variables
        $nombre   = $datosValidados['nombre'];
        $apellido = $datosValidados['apellido'];
        $email    = $datosValidados['email'];

        // Encriptamos la contraseña por seguridad
        $password = bcrypt($datosValidados['password']);

        // 3. Aquí guardarías los datos usando tus variables individuales:
        /*
        User::create([
            'nombre'   => $nombre,
            'apellido' => $apellido,
            'email'    => $email,
            'password' => $password,
        ]);
        */

        // 4. Redireccionamos al usuario con un mensaje de éxito
        return redirect()->back()->with('status', '¡Tu cuenta ha sido creada con éxito!');
    }
}
