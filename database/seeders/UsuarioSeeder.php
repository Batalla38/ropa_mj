<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // CAMBIO: Buscamos por correo primero para evitar que se duplique
        Usuario::firstOrCreate(
            ['correo' => 'solangemtl88@gmail.com'], // Condición de búsqueda
            [
                'nombre' => 'Juan',
                'apellido' => 'Administrador',
                'id_rol' => 1, 
                'contraseña' => bcrypt('clave1234'), 
            ]
        );
    }
}