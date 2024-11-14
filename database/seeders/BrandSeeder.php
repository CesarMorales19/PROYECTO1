<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run()
    {
        // Crear 50 marcas
        foreach (range(1, 50) as $index) {
            Brand::create([
                'name' => 'Marca ' . $index,
                'description' => 'Descripción de la marca ' . $index,
            ]);
        }
    }
}
