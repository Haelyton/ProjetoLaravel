<?php

namespace Tests\Unit;

use Tests\TestCase;

class PriceHelperTest extends TestCase
{
    public function test_price_formatting()
    {
        $price = 1000;
        $formatted = number_format($price, 2, ',', '.');

        $this->assertEquals('1.000,00', $formatted);
    }
}
