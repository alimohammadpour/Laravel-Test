<?php

namespace App\Classes;
use App\Enums\CurrencyEnum;
use App\Models\Product;

class DiscountTransformer {
    private function calculateDiscount(Product $product): array {
        if ($product->isBoot()) {
            $handler = new DiscountHandler(new BootDiscountHandler());
        } elseif ($product->isSpecificSku()) {
            $handler = new DiscountHandler(new SkuDiscountHandler());
        } elseif ($product->isMultipleDiscounted()) {
            $handler = new DiscountHandler(new MultipleDiscountHandler());
        } else {
            $handler = new DiscountHandler(new NoDiscountHandler());
        }
        return $handler->calculate($product->price);
    }

    public function apply(Product $product) {
        return [...$product->only('sku', 'name', 'category'),
            'price' => [ 
                'original' => $product->price, 
                ...$this->calculateDiscount($product),
                'currency' => CurrencyEnum::EUR  
            ] 
        ];
    }
}