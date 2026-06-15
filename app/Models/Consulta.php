<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    // Opciones para los tipos de consulta disponibles en el sistema
    public const TIPOS = [
        'Presupuesto',
        'Envios',
        'Productos',
        'Stock',
    ];

    // Nombre de la tabla en la base de datos
    protected $table = 'consultas';

    // Campos que permitimos que se carguen de manera masiva (Mass Assignment)
    // Agregamos 'estado' para poder controlar si está Pendiente o Respondido
    protected $fillable = [
        'correo', 
        'tipoConsul', 
        'descripcion',
        'respuesta',
        'estado'
    ];

    // Casteo de Atributos (se mantiene limpio por ahora)
    protected $casts = [
        // 'correo' => 'string',
        // 'tipoConsul' => 'string',
        // 'descripcion' => 'text',    
    ];
}

