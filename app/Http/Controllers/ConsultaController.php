<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;

class ConsultaController extends Controller
{
    // 1. Muestra la lista de consultas en el panel
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
            'respuesta' => $request->respuesta,
            'estado' => 'Respondido'
        ]);

        return redirect('/gestionConsultas')
            ->with('exito', 'Consulta respondida correctamente.');
    }

    // PARTE PÚBLICA (Mantenemos tu store que ya andaba de diez)
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
}