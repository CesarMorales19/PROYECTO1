<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'brand_id',
    ];
    protected $primaryKey = "id";
    // Relación con la categoría
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relación con la marca
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
