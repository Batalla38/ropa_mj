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
    public function up(): void
        {
                Schema::create('producto', function (Blueprint $table) {
                $table->id();
                $table->string('nombre', 150);
                $table->text('descripcion')->nullable();
                $table->decimal('precio', 10, 2);
                $table->integer('stock')->default(0);
                $table->string('genero')->nullable(); // Guardará "masculino, femenino" o "unisex"
                $table->string('talle')->nullable();  // Guardará "X, XL
                $table->string('url_imagen')->nullable();
                $table->boolean('activo')->default(true);
                $table->timestamps();

                //vinculacion de tablas
                //$table->foreignId('categoria_id')
                //    ->constrained('caegorias')
                //    ->onDelete('cascade');
                //$table->foreignId('subcaegoria_id')
                //    ->constrained('subcaegorias')
                //    ->onDelete('cascade'); 
                //$table->timestamps();
                });
        }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
