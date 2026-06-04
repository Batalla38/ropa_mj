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
// En app/Models/Usuario.php (o User.php)

class Usuario extends Authenticatable
{
    // ... tus otras propiedades como $table, $fillable, etc.

    /**
     * Le dice a Laravel que use 'contraseña' en lugar de 'password'
     */
    public function getAuthPassword()
    {
        return $this->contraseña;
    }
}
