<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = [
    'nombre',
    'descripcion',
    'categoria_id',
    'precio',
    'stock',
    'url_imagen',
    'activo',
    ];
    //Casteo de Atributos
    protected $casts = [
    'nombre' => 'varchar(100)',
    'descripcion' => 'text',
    'categoria_id' => 'integer',
    'precio' => 'decimal:2',
    'stock' => 'integer',
    'url_imagen' => 'varchar(255)',
    'activo' => 'boolean',
    ];
}
