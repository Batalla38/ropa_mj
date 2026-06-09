<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    // 1. Asegúrate de que apunte a tu tabla personalizada
    protected $table = 'usuarios'; 

    // 2. Si tu clave primaria se llama 'id_usuario' (según tu captura anterior), agrégalo:
    protected $primaryKey = 'id_usuario';

    // 3. ¡ESTO ES LO MÁS IMPORTANTE! Agrega 'id_rol' aquí dentro:
    protected $fillable = [
        'nombre', 
        'apellido', 
        'id_rol', 
        'correo', 
        'contraseña'
    ];

    // 4. NUEVO: Oculta la contraseña encriptada por seguridad
    protected $hidden = [
        'contraseña',
    ];
    
    // Desactiva los timestamps (created_at y updated_at) si tu tabla no los tiene
    public $timestamps = false; 
}