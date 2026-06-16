<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;

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
     * 3. NUEVO MÉTODO: Muestra el historial de consultas privado del cliente logueado.
     * Muestra el historial de consultas saltándose la verificación de login.
     */
    public function misConsultas()
    {
        // Ponemos exactamente el correo que figura en tu phpMyAdmin
        $userCorreo = 'kiki@gmail.com';

        // Buscamos las consultas en la base de datos que coincidan con ese correo
        $consultas = Consulta::where('correo', $userCorreo)
            ->orderBy('created_at', 'desc')
            ->get();

        // Retorna tu archivo Blade
        return view('misConsultas', compact('consultas'));
    }
}