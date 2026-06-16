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
        Schema::create('compras', function (Blueprint $table) {
            $table->id('id_compra'); // Clave primaria automática

            // Relación con tu tabla 'usuarios'.
            // Usamos un entero sin signo para que coincida con el ID de usuarios.
            $table->unsignedBigInteger('id_usuario');

            // Columnas para registrar qué y cuánto se compró
            $table->integer('stock'); // Cuántas unidades compró
            $table->decimal('precio', 10, 2); // El precio histórico al momento de la compra

            $table->timestamps(); // Crea 'created_at' y 'updated_at' automáticamente (Fecha y hora)

            // Configuración de la clave foránea manual apuntando a tu tabla real
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
    }
};
