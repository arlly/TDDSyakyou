<?php

use MyApp\Repository\CurrencyRepository;
use MyApp\Config\ConfigCurrencies;
use MyApp\Usecase\GetCurrencyCollection;

class RepositoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function ちゃんと取得できるかのテスト()
    {
        $repo = new CurrencyRepository();
        $currencyCollection = $repo->getEntityCollection(ConfigCurrencies::YEN());

        $this->assertNotEmpty($currencyCollection->get(0)->getValue());
    }

    /**
     * @test
     */
    public function ユースケースを使ったテスト()
    {
        $repo = new CurrencyRepository();
        $usecase = new GetCurrencyCollection($repo);

        $currencyCollection = $usecase->run(ConfigCurrencies::DOLL());
        $this->assertNotEmpty($currencyCollection->get(0)->getName());

    }



}