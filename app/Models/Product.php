<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'product_code',
        'barcode',
        'category',
        'description',
        'price',
        'image',
        'stock',
        'is_active',
    ];
    protected $casts = [
        'is_active' => 'boolean',
        'price' => 'decimal:2',
    ];
}
