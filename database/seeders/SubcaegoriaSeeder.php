<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subcaegoria;

class SubcaegoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Subcaegoria::create([
            'nombreSub' => 'Pantalones',     
        ]);

        Subcaegoria::create([
            'nombreSub' => 'Remeras', 
        ]); 

    }
}
