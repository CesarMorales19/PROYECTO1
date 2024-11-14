<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run()
    {
        // Crear 50 órdenes
        foreach (range(1, 50) as $index) {
            Order::create([
                'user_id' => User::inRandomOrder()->first()->id,  // Asocia una orden con un usuario aleatorio
                'status' => 'pendiente',
                'total' => rand(100, 5000),  // Total aleatorio entre 100 y 5000
            ]);
        }
    }
}
