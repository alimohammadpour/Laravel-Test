<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'name',
        'category',
        'price',
    ];

    public function isBoot() {
        return $this->category === 'boots';
    }

    public function isSpecificSku() {
        return $this->sku === '000003';
    }

    public function isMultipleDiscounted() {
        return $this->isBoot() && $this->isSpecificSku();
    }
}
