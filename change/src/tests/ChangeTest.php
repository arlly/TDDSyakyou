<?php
use MyApp\Entity\PaymentPrice;
use MyApp\Entity\TotalPrice;
use MyApp\Entity\Change;
use MyApp\Usecase\CulcChange;



class ChangeTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function とりあえずおつりを求めるテスト()
    {
        $paymentPrice = new PaymentPrice(10000);
        $totalPrice = new TotalPrice(9800);

        $usecase = new CulcChange();
        $change = $usecase->culc($paymentPrice, $totalPrice);

        $this->assertEquals(200, $change->getChange());
    }

    /**
     * @test
     * @expectedException Exception
     * 負の数になったら例外
     */
    public function おつりがマイナスで例外になるテスト()
    {
        $paymentPrice = new PaymentPrice(10000);
        $totalPrice = new TotalPrice(10001);

        $usecase = new CulcChange();
        $change = $usecase->culc($paymentPrice, $totalPrice);

        $this->assertEquals(200, $change->getChange());
    }
}