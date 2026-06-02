<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    public $timestamps = true;
    protected $fillable = [
        'nombre',
        'apellido',
        'id_rol',
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
