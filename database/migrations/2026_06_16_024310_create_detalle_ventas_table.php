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
    Schema::create('detalle_ventas', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('venta_id'); 
        $table->unsignedBigInteger('id_producto'); 
        $table->string('nombre_producto');
        $table->decimal('precio_unitario', 10, 2);
        $table->integer('cantidad');
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
        Schema::dropIfExists('detalle_ventas');
    }
};
