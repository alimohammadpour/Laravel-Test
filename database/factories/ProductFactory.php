<?php

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'sku'      => $faker->name,
        'name'     => $faker->text(200),
        'category' => $faker->randomElement(['boots', 'sandals', 'sneakers']),
        'price'    => $faker->numberBetween(1000, 9999)
    ];
});