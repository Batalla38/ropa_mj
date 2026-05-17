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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Crea un campo 'id' auto-incremental. Es la Clave Primaria (PK).
            $table->string('name'); // Una columna de texto para el nombre del cliente (VARCHAR en SQL).
            $table->string('email')->unique(); // El email del cliente. ->unique() asegura que nadie se registre dos veces con el mismo correo.
            $table->timestamp('email_verified_at')->nullable(); // Guarda la fecha y hora de cuando verificó su mail. ->nullable() significa que puede quedar vacío (NULL) al principio.
            $table->string('password'); // Guarda la contraseña (que Laravel encripta automáticamente por seguridad).
            $table->rememberToken(); // Crea un campo especial llamado 'remember_token' que sirve para mantener la sesión abierta del cliente ("Recordarme" al iniciar sesión).
            $table->timestamps(); // Crea automáticamente DOS columnas: 'created_at' (cuándo se registró) y 'updated_at' (cuándo modificó sus datos por última vez).
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // Usa el email como Clave Primaria (PK). No se pueden repetir emails acá.
            $table->string('token'); // El código o token de seguridad temporal que se le manda por mail para validar que es él.
            $table->timestamp('created_at')->nullable(); // La hora exacta en que pidió restablecer la contraseña (para ponerle un tiempo de expiración, por ejemplo, que dure 60 minutos).
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Un ID de texto único para cada sesión que se abre.
            $table->foreignId('user_id')->nullable()->index(); // Si el cliente inició sesión, acá se guarda su ID de la tabla 'users'. ->index() hace que las búsquedas sean súper rápidas. Es una Clave Foránea (FK).
            $table->string('ip_address', 45)->nullable(); // Guarda la dirección IP de la computadora o celular desde el que entraron a la tienda.
            $table->text('user_agent')->nullable(); // Guarda los datos del navegador y sistema operativo (ej: "Chrome en Windows 11").
            $table->longText('payload'); // Texto gigante encriptado donde se guardan los datos internos de lo que el usuario está haciendo (por ejemplo, si agregó ropa al carrito antes de registrarse).
            $table->integer('last_activity')->index(); // Un número entero (Timestamp) que marca el último segundo exacto en que el usuario hizo clic en la página, para saber si la sesión expiró por inactividad.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
