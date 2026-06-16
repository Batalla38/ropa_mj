<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    // Le aclaramos a Laravel que la tabla en la base de datos es "ventas"
    protected $table = 'ventas';

    // Lista blanca de campos que permitimos llenar en masa desde el carrito
    protected $fillable = [
        'user_id',
        'provincia',
        'localidad',
        'direccion',
        'medio_pago',
        'referencia_pago',
        'total',
        'estado'
    ];
}