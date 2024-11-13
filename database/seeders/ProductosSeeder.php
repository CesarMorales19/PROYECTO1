<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Crear 10 productos aleatorios
        for ($i = 0; $i < 10; $i++) {
            DB::table('productos')->insert([
                'nombre' => $faker->words(3, true),  // Genera un nombre de 3 palabras
                'descripcion' => $faker->sentence(),  // Genera una frase aleatoria
                'precio' => $faker->randomFloat(2, 10, 1000),  // Precio entre 10 y 1000 con 2 decimales
                'cantidad' => $faker->numberBetween(1, 100),  // Cantidad entre 1 y 100
                'imagen' => $faker->imageUrl(640, 480, 'technics', true, 'Faker'),  // Imagen de muestra
            ]);
        }
    }
}
