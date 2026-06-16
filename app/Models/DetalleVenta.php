<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    // Le indicamos la tabla exacta
    protected $table = 'detalle_ventas';

    // ✨ CONFIGURACIÓN CLAVE: Agregamos id_producto a la lista blanca
    protected $fillable = [
        'venta_id', 
        'id_usuario',      // <-- Agrega este
        'correo',
        'id_producto',     // <-- Asegurate de que esté escrito exactamente así
        'nombre_producto', 
        'precio_unitario', 
        'cantidad'
    ];
}