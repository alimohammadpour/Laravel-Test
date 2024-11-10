<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'sku',
        'name',
        'category',
        'price',
    ];

    protected $casts = [
        'price' => 'integer',
    ];
}
