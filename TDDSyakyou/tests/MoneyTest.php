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
        $five->times(2);
        $this->assertEquals(10, $five->amount);


    }



}