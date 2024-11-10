<?php

namespace App\Classes;

use App\Models\Product;

interface DiscountHandlerInterface {
    public function calculate(int $price): array;
}