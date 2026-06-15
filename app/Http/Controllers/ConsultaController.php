<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta; // Modelo importado correctamente

class ConsultaController extends Controller
{
    // ==========================================
    // PARTE PÚBLICA: El cliente envía la consulta
    // ==========================================
    
    public function store(Request $request)
    {
        // 1. Validar que los datos cumplan con lo requerido
        // CAMBIO: Bajamos max a 300 para que coincida exactamente con tu base de datos
        $request->validate([
            'correo' => 'required|email',
            'tipoConsul' => 'required',
            'descripcion' => 'required|string|max:300', 
        ]);

        // 2. Crear el registro en la base de datos
        $consulta = new Consulta();
        $consulta->correo = $request->correo;
        $consulta->tipoConsul = $request->tipoConsul; 
        $consulta->descripcion = $request->descripcion;
        $consulta->estado = 'Pendiente'; // Estado por defecto al crearse
        $consulta->save();

        // 3. Redireccionar de forma fija a la página para asegurar que no se pierda la sesión en Laragon
        return redirect('/consultas')->with('exito', '¡Tu consulta fue enviada con éxito!');
    }

    // ==========================================
    // PARTE PRIVADA: Gestión del Administrador
    // ==========================================

    // 1. Muestra la lista de consultas
    public function index()
    {
        // Trae todas las consultas de la base de datos, ordenadas por las más recientes
        $consultas = Consulta::orderBy('created_at', 'desc')->get();

        // Retorna tu vista real pasándole las consultas de la BD
        return view('admin.gestionConsultas', compact('consultas'));
    }

    // 2. Procesa la respuesta que escribe el Administrador
    public function responder(Request $request, $id)
    {
        // Validar que la respuesta no vaya vacía
        $request->validate([
            'respuesta' => 'required|string|max:1000',
        ]);

        // Buscar la consulta en la base de datos por su ID
        $consulta = Consulta::findOrFail($id);
        
        // Guardar la respuesta escrita por el admin y cambiar el estado
        $consulta->respuesta = $request->respuesta;
        $consulta->estado = 'Respondido';
        $consulta->save();

        // Redireccionar fijo al panel de gestión
        return redirect('/gestionConsultas')->with('exito', 'Consulta respondida correctamente.');
    }
}