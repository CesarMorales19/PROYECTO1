<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        //$this->call(BookSeederExample::class);

        //$this->call(BookSeeder::class);
        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
        //$this->call(ProductosSeeder::class);
        $this->call([
            UserSeeder::class, // Llama al UserSeeder
            CategorySeeder::class,  // Llama al CategorySeeder
            BrandSeeder::class,     // Llama al BrandSeeder
            ProductSeeder::class,   // Llama al ProductSeeder
            OrderSeeder::class,     // Llama al OrderSeeder
            OrderItemSeeder::class, // Llama al OrderItemSeeder
        ]);
    }
}
