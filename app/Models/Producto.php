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
    'categoria_id' => 'integer',
    'precio' => 'decimal:2',
    'stock' => 'integer',
    'activo' => 'boolean',
    ];
}
