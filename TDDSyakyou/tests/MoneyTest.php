<?php
use MyApp\Money\Doller;
use MyApp\Money\Franc;

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

        $this->assertTrue((new Franc(5))->equals(new Franc(5)));
        $this->assertFalse((new Franc(5))->equals(new Franc(6)));
    }

    /**
     * @test
     */
    public function フランの掛け算のテスト()
    {
        $five = new Franc(5);
        $this->assertEquals((new Franc(10)), $five->times(2));
        $this->assertEquals((new Franc(15)), $five->times(3));
    }
}