<?php

namespace App\Classes;

class DiscountHandler {
    private $handler;

    public function __construct(DiscountHandlerInterface $handler) {
        $this->handler = $handler;
    }

    public function calculate(int $price): array {
        return $this->handler->calculate($price);
    }
}