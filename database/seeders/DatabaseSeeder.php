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
        // 1. Primero corren los seeders de los productos y categorías
        $this->call([
            CaegoriaSeeder::class,
            SubcaegoriaSeeder::class,
            ProductoSeeder::class,
        ]);

        // 2. Después se limpia la tabla usuarios
        DB::table('usuarios')->truncate();

        // 3. Y acá abajo se inserta el administrador
        DB::table('usuarios')->insert([
            'id' => 1,
            'nombre' => 'Admin',
            'apellido' => 'Ropa MJ',
            'correo' => 'admin@ropa-mj.com',
            'id_rol' => 1,
            'contraseña' => bcrypt('admin1234'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    } // <--- Asegurate de que esta llave cierre TODO el método run()
}
