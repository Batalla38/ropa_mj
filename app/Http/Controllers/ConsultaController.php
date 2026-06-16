<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;
use Illuminate\Support\Facades\DB; // Importamos la fachada DB para consultar la tabla usuarios

class ConsultaController extends Controller
{
    // 🏢 LADO ADMINISTRADOR: Muestra la lista de consultas en el panel de gestión
    public function index()
    {
        $consultas = Consulta::orderBy('created_at', 'desc')->get();
        return view('admin.gestionConsultas', compact('consultas'));
    }

    // 🌍 LADO CLIENTE (PÚBLICO): Muestra la vista de preguntas frecuentes dinámicas
    // ✨ NUEVO MÉTODO CENTRAL: Filtra solo las que tienen respuesta para armar las FAQ
    public function mostrarFaq()
    {
        // Traemos solo las consultas que ya tengan una respuesta cargada por el admin
        $faqDinamicas = Consulta::whereNotNull('respuesta')
            ->where('respuesta', '!=', '')
            ->orderBy('id', 'desc')
            ->get();

        // Mandamos los datos a tu vista pública 'consultas.blade.php'
        return view('consultas', compact('faqDinamicas'));
    }

    // 2. Procesa la respuesta que escribe el administrador
    public function responder(Request $request, $id)
    {
        $request->validate([
            'respuesta' => 'required|string|max:1000',
        ]);

        $consulta = Consulta::findOrFail($id);

        $consulta->update([
            'text_respuesta' => $request->respuesta,
            'respuesta' => $request->respuesta,
            'estado' => 'Respondido' // El estado cambia para tus filtros del panel
        ]);

        return redirect('/gestionConsultas')
            ->with('exito', 'Consulta respondida correctamente.');
    }

    // PARTE PÚBLICA: Guarda la consulta que envía el cliente
    public function store(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'tipoConsul' => 'required',
            'descripcion' => 'required|string|max:300',
        ]);

        Consulta::create([
            'correo' => $request->correo,
            'tipoConsul' => $request->tipoConsul,
            'descripcion' => $request->descripcion,
            'estado' => 'Pendiente'
        ]);

        // Cambiamos la redirección a la ruta pública de consultas
        return redirect()->route('consultas.index')->with('exito', '¡Tu consulta fue enviada con éxito!');
    }

    /**
     * 3. MÉTODO CORREGIDO: Muestra el historial de consultas privado del cliente logueado.
     * Busca el correo usando el 'user_id' guardado en la sesión de Ropa MJ.
     */
    public function misConsultas()
    {
        // 1. Obtenemos el ID del usuario que guardó tu LoginController en la sesión
        $userId = session('user_id');

        // 2. Control de Seguridad: Si no hay ID en la sesión, significa que no inició sesión
        if (!$userId) {
            return redirect('/login')
                ->with('error', 'Por favor, inicia sesión para acceder a tu historial de consultas privado.');
        }

        // 3. Vamos a buscar a la base de datos el correo de este usuario usando su ID
        $usuario = DB::table('usuarios')->where('id', $userId)->first();

        // Por seguridad, si el usuario no existe en la base de datos o no tiene correo, lo mandamos al login
        if (!$usuario || empty($usuario->correo)) {
            return redirect('/login')
                ->with('error', 'No se pudo verificar tu cuenta de usuario.');
        }

        // 4. Buscamos ÚNICAMENTE las consultas que pertenezcan al correo de este usuario logueado
        $consultas = Consulta::where('correo', $usuario->correo)
            ->orderBy('created_at', 'desc')
            ->get();

        // 5. Retornamos la vista pasándole los registros filtrados de forma segura
        return view('misConsultas', compact('consultas'));
    }
}
