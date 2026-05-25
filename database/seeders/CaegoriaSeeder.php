<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Caegoria;

class CaegoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Caegoria::create([
            'nombreC' => 'Hombre',
        ]);
        Caegoria::create([
            'nombreC' => 'Mujer', 
        ]);
        
    }
}
