<?php

namespace Database\Seeders;

use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    public function run()
    {
        // Crear 50 elementos de órdenes
        foreach (range(1, 50) as $index) {
            OrderItem::create([
                'order_id' => Order::inRandomOrder()->first()->id,  // Asocia un ítem con una orden aleatoria
                'product_id' => Product::inRandomOrder()->first()->id,  // Asocia un producto aleatorio
                'quantity' => rand(1, 5),  // Cantidad aleatoria entre 1 y 5
                'price' => rand(100, 5000),  // Precio aleatorio entre 100 y 5000
            ]);
        }
    }
}
