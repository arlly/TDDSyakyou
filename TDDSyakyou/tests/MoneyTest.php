<?php
use MyApp\Money\Doller;

class MoneyTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function 掛け算のテスト()
    {
        $five = new Doller(5);
        $product = $five->times(2);
        $this->assertEquals(10, $product->amount);

        $product = $five->times(3);
        $this->assertEquals(15, $product->amount);
    }

    public function testEquality()
    {
        $this->assertTrue((new Doller(5))->equals(new Doller(5)));
        $this->assertFalse((new Doller(5))->equals(new Doller(6)));
    }
}