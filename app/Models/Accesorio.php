<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accesorio extends Model
{
    use HasFactory;

    // Definimos los campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',      // Asegúrate de que estos sean los campos de tu tabla
        'descripcion',
        'precio',
        'tipo',
    ];
}
