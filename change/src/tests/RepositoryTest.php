<?php

use MyApp\Repository\CurrencyRepository;
use MyApp\Config\ConfigCurrencies;

class RepositoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function ちゃんと取得できるかのテスト()
    {
        $repo = new CurrencyRepository();
        $currencyCollection = $repo->getEntityCollection(ConfigCurrencies::YEN());

        var_dump($currencyCollection->get(0)->getValue());

        $this->assertNotEmpty($currencyCollection->get(0)->getValue());
    }



}