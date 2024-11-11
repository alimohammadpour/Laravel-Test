<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sku'      => $this->faker->name,
            'name'     => $this->faker->text(200),
            'category' => $this->faker->randomElement(['boots', 'sandals', 'sneakers']),
            'price'    => $this->faker->numberBetween(1000, 5000)
        ];
    }
}