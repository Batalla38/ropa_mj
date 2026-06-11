<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Obligatorio para poder usar la fachada DB

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 1. Ejecuta tus seeders de categorías y productos actuales
        $this->call([
            CaegoriaSeeder::class,
            SubcaegoriaSeeder::class,
            UsuarioSeeder::class,
        ]);

        // 2. Limpia la tabla users antes para evitar el error de correo duplicado
        DB::table('users')->truncate();

        // 3. Inserta los datos del Administrador en texto plano para tu nuevo LoginController
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Administrador Ropa MJ',
            'email' => 'admin@ropa-mj.com',
            'password' => 'admin1234', //  Texto plano como me pediste ("admin1234")
            'is_admin' => 1,           // Marcado como administrador
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
