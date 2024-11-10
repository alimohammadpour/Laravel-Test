<?php

namespace App\Classes;
use App\Classes\DiscountHandlerInterface;

class NoDiscountHandler implements DiscountHandlerInterface {
    public function calculate(int $price): array {
        return [ 'final' => $price, 'discount_percentage' => null ];
    }
}