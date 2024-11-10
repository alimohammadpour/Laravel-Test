<?php

namespace App\Classes;
use App\Classes\DiscountHandlerInterface;

class BootDiscountHandler implements DiscountHandlerInterface {
    public function calculate(int $price): array {
        return [ 'final' => round($price * 0.7), 'discount_percentage' => '30%'];
    }
}