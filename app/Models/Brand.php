<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];
    protected $primaryKey = "id";

    // Relación con productos
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
