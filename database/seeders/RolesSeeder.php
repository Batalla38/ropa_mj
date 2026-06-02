<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roles;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Roles::create([
            'id'=> 1,
            'correo' => 'solangemtl88@gmail.com',
            'contraseña' => '124356',


        ]);
    }
}
