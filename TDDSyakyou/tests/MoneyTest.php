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
        $this->assertEquals((new Doller(10)), $five->times(2));
        $this->assertEquals((new Doller(15)), $five->times(3));
    }

    public function testEquality()
    {
        $this->assertTrue((new Doller(5))->equals(new Doller(5)));
        $this->assertFalse((new Doller(5))->equals(new Doller(6)));
    }
}