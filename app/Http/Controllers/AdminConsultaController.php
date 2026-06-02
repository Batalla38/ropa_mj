<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta; // Importa tu modelo de consultas

class AdminConsultaController extends Controller
{
    /**
     * Muestra la tabla con el listado de consultas.
     * (ESTO ES LO QUE SE HABÍA BORRADO)
     */
    public function index()
    {
        // Traemos todas las consultas de la base de datos
        $consultas = Consulta::all(); 
        
        // Retornamos la vista independiente
        return view('admin.adminConsultas', compact('consultas'));
    }

    /**
     * Procesa la respuesta enviada desde el modal.
     */
    public function responder(Request $request, $id)
{
    // 1. Validamos que la respuesta cumpla con los requisitos
    $request->validate([
        'respuesta' => 'required|string|min:5',
    ]);

    // 2. Buscamos la consulta por su ID
    $consulta = Consulta::findOrFail($id);

    // 3. Guardamos el texto de la respuesta en la columna real 'respuesta'
    $consulta->respuesta = $request->input('respuesta');
    
    // NOTA: Como en tu BD no existe la columna 'estado', no la llamamos.
    // El simple hecho de que 'respuesta' tenga texto ya significa que está respondida.

    // 4. Guardamos los cambios de forma física en la BD
    $consulta->save(); 

    // 5. Volvemos atrás con el mensaje de éxito
    return redirect()->back()->with('success', '¡La respuesta se guardó con éxito en la base de datos!');
}
}