<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caegoria extends Model
{
    protected $table = 'caegorias';
    protected $fillable = [
    'nombreC',
    ];
    //Casteo de Atributos
    protected $casts = [
    'nombreC' => 'string',
    
    ];
}
