<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();                                         // id
            $table->string('nombre', 100);                        // Título
            $table->text('descripcion');                          // Descripción
            $table->decimal('precio', 10, 2);                     // Precio
            $table->string('genero')->nullable();                 // Género (Nuevo por código)
            $table->string('talle')->nullable();                  // Talles (Nuevo por código)
            $table->integer('stock')->default(0);                 // Stock
            $table->string('url_imagen')->default('default.png'); // Imagen
            $table->boolean('activo')->default(true);             // Activo
            $table->timestamps();                                 // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
