<?php
namespace MyApp\Usecase;

use PHPMentors\DomainKata\Repository\RepositoryInterface;
use MyApp\Config\ConfigCurrencies;

class GetCurrencyCollection
{
    protected $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function run(ConfigCurrencies $config)
    {
        return $this->repository->getEntityCollection($config);
    }
}