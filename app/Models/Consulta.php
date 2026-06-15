<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $table = 'consultas';

    // Campos que se pueden llenar en masa (create / update)
    protected $fillable = [
        'correo',
        'tipoConsul',
        'descripcion',
        'respuesta',
        'estado',
    ];

    // Activar timestamps (created_at y updated_at)
    public $timestamps = true;

    // Opcional: valores posibles de tipos de consulta
    const TIPOS = [
        'Presupuestos y cotizaciones',
        'Envios',
        'Devoluciones y cambios',
        'Stock',
        'Otros'
    ];
}