<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefonos', function (Blueprint $table) {
            $table->id(); // Crea la columna 'id' como clave primaria
            $table->string('nombre'); // Crea la columna 'nombre' de tipo string
            $table->string('marca'); // Crea la columna 'marca' de tipo string
            $table->string('modelo'); // Crea la columna 'modelo' de tipo string
            $table->decimal('precio', 8, 2); // Crea la columna 'precio' como decimal con 8 dígitos, 2 decimales
            $table->integer('stock'); // Crea la columna 'stock' de tipo entero
            $table->timestamps(); // Crea las columnas 'created_at' y 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telefonos'); // Elimina la tabla 'telefonos' si existe
    }
};
