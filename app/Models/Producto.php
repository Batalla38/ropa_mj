<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    // Si tu tabla en phpMyAdmin no tiene las columnas created_at y updated_at, dejamos esto en false:
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'categoria_id',
        'subcategoria_id',
        'precio',
        'stock',
        'url_imagen',
        'activo',
    ];

    // Casteo de Atributos (CORREGIDO con formatos válidos de Laravel)
    protected $casts = [
        'nombre' => 'string',
        'descripcion' => 'string',
        'categoria_id' => 'integer',
        'subcategoria_id' => 'integer',
        'precio' => 'float',
        'stock' => 'integer',
        'url_imagen' => 'string',
        'activo' => 'boolean',
    ];
}
