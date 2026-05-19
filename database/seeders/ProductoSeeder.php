<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Producto::create([
            'id'=> 1,
            'nombre' => 'Jean Slim Fit Hombre',
            'descripcion' => 'Pantalón de jean elastizado azul localizado.',
            'precio' => 245,
            'stock' => 15,
            'url_imagen' => 'ConjuntoEMEM2.jpeg',
            'activo' => true
        ]);
    }
}
