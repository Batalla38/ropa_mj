<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    // 🕒 ACTIVADOS: Laravel manejará automáticamente 'created_at' y 'updated_at'
    public $timestamps = true;
    protected $fillable = [
    'nombre',
    'apellido',
    'correo',
    'contraseña',
    ];
    //Casteo de Atributos
    //protected $casts = [
    //'nombre' => 'varchar',
   // 'apellido' => 'varchar',
   // 'correo' => 'varchar',
    //'contraseña' => 'varchar',
    //];
}
