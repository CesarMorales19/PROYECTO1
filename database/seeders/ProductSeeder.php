<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Crear 50 productos
        foreach (range(1, 50) as $index) {
            Product::create([
                'name' => 'Producto ' . $index,
                'description' => 'Descripción del producto ' . $index,
                'price' => rand(100, 5000),  // Precio aleatorio entre 100 y 5000
                'category_id' => Category::inRandomOrder()->first()->id,  // Asocia una categoría aleatoria
                'brand_id' => Brand::inRandomOrder()->first()->id,  // Asocia una marca aleatoria
            ]);
        }
    }
}
