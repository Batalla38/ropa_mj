<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios'; 

    // ❌ BORRAMOS LA LÍNEA DE id_usuario PARA QUE USE EL "id" ESTÁNDAR
    
    protected $fillable = [
        'nombre', 
        'apellido', 
        'id_rol', 
        'correo', 
        'contraseña',
        'provincia',  
        'localidad',  
        'direccion'   
    ];

    protected $hidden = [
        'contraseña',
    ];
    
    public $timestamps = false; 
}