<?php

namespace Tests\Unit;

use App\Classes\BootDiscountHandler;
use App\Classes\DiscountHandler;
use App\Classes\MultipleDiscountHandler;
use App\Classes\NoDiscountHandler;
use App\Classes\SkuDiscountHandler;
use PHPUnit\Framework\TestCase;

class DiscountHandlerTest extends TestCase
{
    /**
     * Boot discount handler
     */
    public function test_boot_discount_handler(): void
    {
        $discount_handler = new DiscountHandler((new BootDiscountHandler()));
        $discounted = $discount_handler->calculate(900);
        $this->assertEquals(630, $discounted['final']);
    }

    /**
     * Sku discount handler
     */
    public function test_sku_discount_handler(): void
    {
        $discount_handler = new DiscountHandler((new SkuDiscountHandler()));
        $discounted = $discount_handler->calculate(900);
        $this->assertEquals(765, $discounted['final']);
    }

    /**
     * Multiple discount handler
     */
    public function test_multiple_discount_handler(): void
    {
        $discount_handler = new DiscountHandler((new MultipleDiscountHandler()));
        $discounted = $discount_handler->calculate(900);
        $this->assertEquals(630, $discounted['final']);
    }

    /**
     * No discount handler
     */
    public function test_no_discount_handler(): void
    {
        $discount_handler = new DiscountHandler((new NoDiscountHandler()));
        $discounted = $discount_handler->calculate(900);
        $this->assertEquals(900, $discounted['final']);
    }
}
