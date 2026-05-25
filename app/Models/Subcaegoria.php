<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcaegoria extends Model
{
    protected $table = 'subcaegorias';
    protected $fillable = [
    'nombreSub',
    //'caegoria_id',
    ];
    //Casteo de Atributos
    protected $casts = [
    'nombreSub' => 'string',
    //'caegoria_id' => 'integer',
    
    ];
}
