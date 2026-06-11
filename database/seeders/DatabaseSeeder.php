<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Obligatorio para poder usar la fachada DB

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Limpiamos la tabla usuarios primero para evitar errores de correos duplicados
        // Usamos el nombre real de tu tabla: 'usuarios'
        DB::table('usuarios')->truncate();

        // 2. Ejecuta tus seeders ordenadamente
        $this->call([
            CaegoriaSeeder::class,
            SubcaegoriaSeeder::class,
            UsuarioSeeder::class, // 👈 Este seeder ahora sí va a correr sin romperse
        ]);
    }
}