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
        // Insertamos directamente en la tabla 'usuarios' con su estructura real
        Usuario::create([
            'nombre' => 'Juan',
            'apellido' => 'Administrador',
            'id_rol' => 1, // <-- Usamos el ID numérico de tu columna real
            'correo' => 'solangemtl88@gmail.com',
            'contraseña' => 'clave1234', // Texto plano sin encriptar como pediste
        ]);
    }
}
