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

        // 2. Buscamos directamente en la tabla 'usuario' (Modificado)
        $user = DB::table('usuarios') // <-- CAMBIADO: 'users' por 'Usuario'
            ->where('correo', $credentials['correo'])
            ->where('contraseña', $credentials['contraseña']) // Compara texto plano directamente
            ->first();

        // 3. Si el usuario existe
        if ($user) {

            // Guardamos manualmente el ID del usuario en la sesión para recordar que inició sesión
            $request->session()->put('user_id', $user->id);
            
            // Si tu columna de nombre se llama 'nombre' o 'name', esto previene errores:
            $user_name = $user->nombre ?? $user->name ?? 'usuarios';
            $request->session()->put('user_name', $user_name);

            // 4. Verificamos si es administrador
            // Revisa si la columna se llama 'is_admin'. Si el ID de tu admin es 1, entrará de todos modos.
            $isAdminColumn = $user->is_admin ?? 0; 
            if ($isAdminColumn == 1 || $user->id == 1) {
                return redirect('/main'); // Te manda directo a la página main (panel de administración)
            }

            // Si es un usuario común, lo mandamos a la raíz
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
