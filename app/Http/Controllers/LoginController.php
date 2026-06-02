<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * Procesa el inicio de sesión.
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

        // 2. Buscamos directamente en la tabla 'usuarios' usando texto plano
        $user = DB::table('usuarios')
            ->where('correo', $credentials['correo'])
            ->where('contraseña', $credentials['contraseña'])
            ->first();

        // 3. Si el usuario existe, validamos su rol
        if ($user) {
            // Evaluamos si es administrador (ya sea por id_rol o por ser el ID 1 primario)
            $rolUsuario = $user->id_rol ?? 0;

            if ($rolUsuario == 1 || $user->id == 1) {
                return redirect('/main'); // Redirecciona al catálogo/panel principal
            }

            return redirect('/'); // Redirecciona a la tienda común
        }

        // 4. Si no se encontró ningún usuario con esos datos, volvemos atrás con error
        return redirect()->back()->withErrors([
            'correo' => 'El correo electrónico o la contraseña son incorrectos.',
        ])->onlyInput('correo');
    }

    /**
     * Cierra la sesión destruyendo los datos manuales.
     */
    public function logout(Request $request)
    {
        // Si usás sesiones manuales, podés limpiar acá o usar Auth si migrás a Laravel estándar
        return redirect('/login')->with('status', 'Sesión cerrada correctamente.');
    }
}
