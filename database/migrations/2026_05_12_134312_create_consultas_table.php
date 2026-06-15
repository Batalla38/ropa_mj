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
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->string('correo');
            $table->string('tipoConsul', 30);
            $table->string('descripcion', 300);
            $table->text('respuesta')->nullable(); 
            $table->string('estado')->default('Pendiente'); // <--- AGREGÁ ESTA LÍNEA ACÁ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultas');
    }
};
