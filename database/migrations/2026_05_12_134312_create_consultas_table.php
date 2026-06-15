<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->string('correo');
            $table->string('tipoConsul', 50);
            $table->string('descripcion', 300); // Límite estricto en BD
            $table->text('respuesta')->nullable(); 
            $table->string('estado')->default('Pendiente'); // Nace como Pendiente siempre
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('consultas');
    }
};