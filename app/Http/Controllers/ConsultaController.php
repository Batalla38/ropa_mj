<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;

class ConsultaController extends Controller
{
    // 1. Muestra la lista de consultas en el panel (Vista del Administrador)
    public function index()
    {
        $consultas = Consulta::orderBy('created_at', 'desc')->get();
        return view('admin.gestionConsultas', compact('consultas'));
    }

    // 2. Procesa la respuesta que escribe el administrador
    public function responder(Request $request, $id)
    {
        $request->validate([
            'respuesta' => 'required|string|max:1000',
        ]);

        $consulta = Consulta::findOrFail($id);

        $consulta->update([
            'text_respuesta' => $request->respuesta, // O 'respuesta' según tu columna exacta
            'respuesta' => $request->respuesta,
            'estado' => 'Respondido'
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

        return redirect('/consultas')->with('exito', '¡Tu consulta fue enviada con éxito!');
    }

    /**
     * 3. NUEVO MÉTODO: Muestra el historial de consultas privado del cliente logueado.
     * Muestra el historial de consultas saltándose la verificación de login.
     */
    public function misConsultas()
    {
        // CAMBIO AQUÍ: Ponemos exactamente el correo que figura en tu phpMyAdmin
        $userCorreo = 'kiki@gmail.com';

        // Buscamos las consultas en la base de datos que coincidan con ese correo
        $consultas = Consulta::where('correo', $userCorreo)
            ->orderBy('created_at', 'desc')
            ->get();

        // Retorna tu archivo Blade
        return view('misConsultas', compact('consultas'));
    }
}
