<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Usamos la fachada DB para leer directo la tabla

class LoginController extends Controller
{
    /**
     * Procesa el formulario de inicio de sesión de forma directa.
     */
    public function store(Request $request)
    {
        // 1. Validamos los campos que vienen del HTML
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ], [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Por favor, ingresa un correo válido.',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        // 2. Buscamos directamente en la base de datos al usuario que coincida con mail y clave en texto plano
        $user = DB::table('users')
            ->where('email', $credentials['email'])
            ->where('password', $credentials['password']) // Compara texto plano directamente (ej: "1234")
            ->first();

        // 3. Si el usuario existe
        if ($user) {

            // Guardamos manualmente el ID del usuario en la sesión para recordar que inició sesión
            $request->session()->put('user_id', $user->id);
            $request->session()->put('user_name', $user->name);

            // 4. Verificamos si es administrador (ya sea por su ID exacto o por la columna is_admin)
            // Podés usar: $user->id == 1  o  $user->is_admin == 1
            if ($user->is_admin == 1 || $user->id == 1) {
                return redirect('/main'); // Te manda directo a la página main
            }

            // Si es un usuario común, lo mandamos a la raíz
            return redirect('/');
        }

        // 5. Si no se encontró ningún usuario con esos datos, volvemos atrás con el error
        return redirect()->back()->withErrors([
            'email' => 'El correo electrónico o la contraseña son incorrectos.',
        ])->onlyInput('email');
    }

    /**
     * Cierra la sesión destruyendo los datos manuales.
     */
    public function logout(Request $request)
    {
        // Limpiamos los datos manuales de la sesión
        $request->session()->forget('user_id');
        $request->session()->forget('user_name');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
