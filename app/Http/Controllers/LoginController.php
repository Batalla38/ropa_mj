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
            'correo' => ['required', 'email'],
            'contraseña' => ['required', 'string'],
        ], [
            'correo.required' => 'El correo electrónico es obligatorio.',
            'correo.email' => 'Por favor, ingresa un correo válido.',
            'contraseña.required' => 'La contraseña es obligatoria.',
        ]);

        // 2. Buscamos directamente en la tabla 'usuarios'
        $user = DB::table('usuarios')
            ->where('correo', $credentials['correo'])
            ->where('contraseña', $credentials['contraseña']) // Compara texto plano directamente
            ->first();


        // 3. Si el usuario existe
        if ($user) {

            // Guardamos manualmente el ID del usuario en la sesión
            $request->session()->put('user_id', $user->id);
            
            // 🛠️ ¡AGREGÁ ESTA LÍNEA CLAVE ACÁ ABAJO!
            $request->session()->put('id_rol', $user->id_rol); // <-- Guarda el rol en la sesión

            // Guardamos el nombre
            $user_name = $user->nombre ?? $user->name ?? 'Usuario';
            $request->session()->put('user_name', $user_name);

            // 4. Verificamos si es administrador
            $rolUsuario = $user->id_rol ?? 0; 
            if ($rolUsuario == 1 || $user->id == 1) {
                return redirect('/main');
            }

            return redirect('/');
        }

        // 5. Si no se encontró ningún usuario con esos datos, volvemos atrás con el error
        return redirect()->back()->withErrors([
            'correo' => 'El correo electrónico o la contraseña son incorrectos.',
        ])->onlyInput('correo');
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