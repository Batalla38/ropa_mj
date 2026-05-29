<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta; // Asegúrate de tener el modelo importado

class ConsultaController extends Controller
{
    // Función encargada de recibir y guardar la consulta
    public function store(Request $request)
    {
        // 1. Validar que los datos cumplan con lo requerido
        $request->validate([
            'correo' => 'required|email',
            'tipoConsul' => 'required',
            'descripcion' => 'required|string|max:1000',
            'respuesta' => 'nullable|string|max:1000', // Si quieres permitir una respuesta opcional
        ]);

        // 2. Crear el registro en la base de datos
        $consulta = new Consulta();
        $consulta->correo = $request->correo;
        $consulta->tipoConsul = $request->tipoConsul; // Ajusta el nombre de la columna si en tu BD se llama distinto
        $consulta->descripcion = $request->descripcion;
        $consulta->respuesta = $request->respuesta;
        $consulta->save();

        // 3. Redireccionar de vuelta con un mensaje de éxito
        return redirect()->back()->with('exito', '¡Tu consulta fue enviada!');
        

    }
}
