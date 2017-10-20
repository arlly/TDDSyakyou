<?php
namespace MyApp\Usecase;

use PHPMentors\DomainKata\Repository\RepositoryInterface;
use MyApp\Config\ConfigCurrencies;

class GetCurrencyCollection
{
    public function run(RepositoryInterface $repository)
    {
        return $repository->getEntityCollection(ConfigCurrencies $config);
    }
}