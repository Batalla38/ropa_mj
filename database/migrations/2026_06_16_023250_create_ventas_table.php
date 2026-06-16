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
        Schema::create('ventas', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id')->nullable(); 
        $table->string('provincia');
        $table->string('localidad');
        $table->string('direccion');
        $table->string('medio_pago');
        $table->string('referencia_pago')->nullable(); 
        $table->decimal('total', 10, 2);
        $table->string('estado')->default('pendiente');
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
        Schema::dropIfExists('ventas_');
    }
};
