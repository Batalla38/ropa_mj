<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'producto';

    // Desactivado si tu tabla en phpMyAdmin no tiene columnas created_at / updated_at
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'genero',
        'talle',
        'stock',
        'url_imagen',
        'activo',
    ];

    protected $casts = [
        'nombre'      => 'string',
        'descripcion' => 'string',
        'precio'      => 'float',
        'genero'      => 'string',
        'talle'       => 'string',
        'stock'       => 'integer',
        'url_imagen'  => 'string',
        'activo'      => 'boolean',
    ];
}
