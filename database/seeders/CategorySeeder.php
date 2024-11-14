<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Crear 50 categorías
        foreach (range(1, 50) as $index) {
            Category::create([
                'name' => 'Categoría ' . $index,
                'description' => 'Descripción de la categoría ' . $index,
            ]);
        }
    }
}
