<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     */
    public function test_product_index_response_keys(): void
    {   
        Product::factory()->create();
        $response = $this->get('/api/products/');
        $response_expected_keys = array_keys($response->original[0]['price']);
        $this->assertEquals(
            $response_expected_keys, 
            ['original', 'final', 'discount_percentage', 'currency']
        );
    }

    public function test_product_index_filter(): void
    {
        Product::factory()->create(['category' => 'sandals']);
        $boot = Product::factory()->create(['category' => 'boots']);
        $response = $this->get('/api/products?category=boots&priceLessThan=10000');

        $this->assertCount(1, $response->original);
        $this->assertEquals($response->original[0]['category'], $boot->category);
    }

    public function test_multiple_discounted_product(): void
    {
        $boot = Product::factory()->create(['category' => 'boots', 'sku' => '000003']);
        $response = $this->get('/api/products/');

        $this->assertEquals($response->original[0]['price']['final'], round($boot->price * 0.7));
    }

    public function test_no_discounted_product(): void
    {
        Product::factory()->create(['category' => 'sandals']);
        $response = $this->get('/api/products/');
        $this->assertNull($response->original[0]['price']['discount_percentage']);
    }
}
