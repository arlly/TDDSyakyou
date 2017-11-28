<?php
use MyApp\Money\Money;
use MyApp\Money\Doller;
use MyApp\Money\Franc;
use MyApp\Money\Bank;
use MyApp\Money\Sum;

class MoneyTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function 掛け算のテスト()
    {
        $five = Money::dollar(5);
        $this->assertEquals(Money::dollar(10), $five->times(2));
        $this->assertEquals(Money::dollar(15), $five->times(3));
    }

    public function testEquality()
    {
        $this->assertTrue(Money::dollar(5)->equals(Money::dollar(5)));
        $this->assertFalse(Money::dollar(5)->equals(Money::dollar(6)));

        $this->assertTrue(Money::franc(5)->equals(Money::franc(5)));
        $this->assertFalse((Money::franc(5))->equals(Money::franc(6)));

        $this->assertFalse((Money::franc(5))->equals(Money::dollar(5)));
    }

    /**
     * @test
     */
    public function メソッドのテスト()
    {
        $this->assertEquals('USD', Money::dollar(1)->currency());
        $this->assertEquals('CHF', Money::franc(1)->currency());
    }

    /**
     * @test
     */
    public function 簡単な足し算のテスト()
    {

        $five = Money::dollar(5);
        $sum = $five->plus($five);
        $bank = new Bank();
        $reduced = $bank->reduce($sum, 'USD');
        $this->assertEquals(Money::dollar(10), $reduced);

    }

    /**
     * @test
     */
    public function 足し算クラスのテスト()
    {
        $five = Money::dollar(5);
        $result = $five->plus($five);
        $sum = $result;

        $this->assertEquals($five, $sum->augend);
        $this->assertEquals($five, $sum->addend);
    }

    /**
     * @test
     */
    public function testReduceSum()
    {
        $sum = new Sum(Money::dollar(3), Money::dollar(4));
        $bank = new Bank();
        $result = $bank->reduce($sum, 'USD');

        $this->assertEquals(Money::dollar(7), $result);

    }

    /**
     * @test
     */
    public function testReduceMoneyDifferentCurrency()
    {
        $bank = new Bank();
        $bank->addRate('CHF', 'USD', 2);
        $result = $bank->reduce(Money::franc(2), 'USD');
        $this->assertEquals(Money::dollar(1), $result);
    }

    /**
     * @test
     */
    public function testIdentityRate()
    {
        $this->assertEquals(1, (new Bank())->rate("USD", "USD"));
    }






}