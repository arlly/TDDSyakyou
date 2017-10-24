<?php
use MyApp\Entity\PaymentPrice;
use MyApp\Entity\TotalPrice;
use MyApp\Entity\Change;
use MyApp\Usecase\CulcChange;
use MyApp\Repository\CurrencyRepository;
use MyApp\Config\ConfigCurrencies;
use MyApp\Usecase\GetCurrencyCollection;
use MyApp\Usecase\GetChangeCollection;
use MyApp\Distribution\ChangeYenDistributer;
use MyApp\Distribution\ChangeDollDistributer;

use Pimple\Container;

class UsecaseTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        parent::setUp();
    }

    /**
     * @test
     */
    public function 缶コーヒーを買って1000円札を出しておつり取得するテスト()
    {
        $paymentPrice = new PaymentPrice(1000);
        $totalPrice = new TotalPrice(130);

        $usecase = new CulcChange();
        $change = $usecase->culc($paymentPrice, $totalPrice);

        $this->assertEquals(870, $change->getChange());
    }

    /**
     * @test
     */
    public function おつり用の通貨のコレクションを取得するテスト()
    {
        $container = new Container();

        /**
         * DI *
         */
        $container['usecase.currency.collection'] = function ($container) {
            $repo = new CurrencyRepository();
            $usecase = new GetCurrencyCollection($repo);

            return $usecase;
        };

        $currencyCollection = $container['usecase.currency.collection']->run(ConfigCurrencies::YEN());
        $this->assertNotEmpty($currencyCollection->get(0)
            ->getName());
    }

    /**
     * @test
     */
    public function おつりのふりわけのテスト()
    {
        $container = new Container();

        $container['usecase.yen.distribution'] = function ($container) {
            $distributer = new ChangeYenDistributer();
            $usecase = new GetChangeCollection($distributer);
            return $usecase;
        };

        $container['usecase.currency.collection'] = function ($container) {
            $repo = new CurrencyRepository();
            $usecase = new GetCurrencyCollection($repo);

            return $usecase;
        };

        /**
         * おつりの計算
         */
        $paymentPrice = new PaymentPrice(1000);
        $totalPrice = new TotalPrice(130);

        $usecase = new CulcChange();
        $change = $usecase->culc($paymentPrice, $totalPrice);

        /**
         * おつりの在庫取得
         */
        $currencyCollection = $container['usecase.currency.collection']->run(ConfigCurrencies::YEN());

        $changeCollection = $container['usecase.yen.distribution']->run($change, $currencyCollection);

        /**
         * 870円を返す
         */
        $this->assertEquals($changeCollection['500円'], 1);
        $this->assertEquals($changeCollection['100円'], 3);
        $this->assertEquals($changeCollection['50円'],  1);
        $this->assertEquals($changeCollection['10円'],  2);
    }
}