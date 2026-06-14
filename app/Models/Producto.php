<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

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

    /**
     * Accessor para automatizar y limpiar las URLs de las imágenes.
     * Evita tener que usar condicionales en las vistas Blade.
     */
    protected function urlImagen(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                // Si está vacío o no tiene registro, devolvemos la imagen por defecto
                if (empty($value)) {
                    return asset('images/default.png');
                }

                // Si por alguna razón ya guardaba "images/", removemos el prefijo duplicado
                if (str_starts_with($value, 'images/')) {
                    $value = str_replace('images/', '', $value);
                }

                // Retorna la URL pública absoluta (ej: http://ropa_mj.test/images/nombre.jpg)
                return asset('images/' . $value);
            }
        );
    }
}
