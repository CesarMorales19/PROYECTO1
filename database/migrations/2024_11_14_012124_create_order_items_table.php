<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id'); // Referencia a la orden
            $table->unsignedBigInteger('product_id'); // Referencia al producto
            $table->integer('quantity'); // Cantidad del producto en la orden
            $table->decimal('price', 10, 2); // Precio del producto en el momento de la compra
            $table->timestamps();

            // Relaciones con las tablas orders y products
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
