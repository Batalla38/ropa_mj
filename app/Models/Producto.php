<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'producto';

    // CAMBIADO A TRUE: Ahora que la migración crea creadat_at y updated_at,
    // le avisamos al modelo que las use automáticamente.
    public $timestamps = true;

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
