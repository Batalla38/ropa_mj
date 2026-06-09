<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Usamos la fachada DB para leer directo la tabla
use Illuminate\Support\Facades\Hash;

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
            'password' => ['required', 'string'],
        ], [
            'correo.required' => 'El correo electrónico es obligatorio.',
            'correo.email' => 'Por favor, ingresa un correo válido.',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        // 2. Buscamos al usuario ÚNICAMENTE por su correo primero
        $user = DB::table('usuarios')
            ->where('correo', $credentials['correo'])
            ->first();
            
        // 3. Si el usuario existe, pasamos a comparar la contraseña encriptada
        // Hash::check toma lo que escribió el usuario y lo compara con el hash de tu BD ($user->contraseña)
        if ($user && Hash::check($credentials['password'], $user->contraseña)) {
            
            // Guardamos manualmente los datos en la sesión
            $request->session()->put('user_id', $user->id);
            $request->session()->put('id_rol', $user->id_rol); 

            // Guardamos el nombre dinámicamente para prevenir errores de columnas
            $user_name = $user->nombre ?? $user->name ?? 'Usuario';
            $request->session()->put('user_name', $user_name);

            // 4. Verificamos si es administrador o rol con acceso
            $rolUsuario = $user->id_rol ?? 0; 
            if ($rolUsuario == 1 || $user->id == 1) {
                return redirect('/main'); // Redirige al panel de administración
            }

            if ($rolUsuario == 2 || $user->id == 2) {
                return redirect('/main'); 
            }
            
            // Si es un usuario común, va a la raíz
            return redirect('/');
        }

        // 5. Si las credenciales no coinciden
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
        $request->session()->forget('id_rol');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
} // <-- Esta es la llave única que cierra la clase al final de todo