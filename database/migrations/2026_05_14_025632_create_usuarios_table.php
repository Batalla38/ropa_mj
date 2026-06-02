<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->integer('id_rol')->nullable(); // Si quieres relacionar con una tabla de roles
            $table->string('correo')->unique();
            $table->string('contraseña',500);
            $table->timestamps();
        });
        // Si estabas queriendo usar un entero para el rol (ej: 1 para admin, 2 para cliente):
        //$table->tinyInteger('rol')->default(2);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
