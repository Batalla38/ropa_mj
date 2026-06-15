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
        // 1. Desactivamos las restricciones de claves foráneas para que MySQL nos deje limpiar sin protestar
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        // Limpiamos la tabla usuarios para evitar errores de correos duplicados
        DB::table('usuarios')->truncate();

        // 2. Reactivamos las restricciones de seguridad
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        // 3. Ejecuta tus seeders ordenadamente
        // CAMBIO: Corregimos el tipeo de 'Categoria' y 'Subcategoria' para que coincidan con tus archivos reales
        $this->call([
            CaegoriaSeeder::class,
            SubcaegoriaSeeder::class,
            UsuarioSeeder::class, 
        ]);
    }
}