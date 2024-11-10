<?php

namespace App\Classes;
use App\Classes\DiscountHandlerInterface;

class SkuDiscountHandler implements DiscountHandlerInterface {
    public function calculate(int $price): array {
        return [ 'final' => round($price * 0.85), 'discount_percentage' => '15%'];
    }
}