<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    // Definimos las opciones aquí
    public const TIPOS = [
        'Presupuesto',
        'Envios',
        'Productos',
        'Stock',
    ];

    protected $table = 'consultas';
    protected $fillable = [
        'correo', 
        'tipoConsul', 
        'descripcion',
        'respuesta'
    ];

    //Casteo de Atributos
    protected $casts = [
    //'correo' => 'string',
    //'tipoConsul' => 'string',
    //'descripcion' => 'text',    
     ];
}


