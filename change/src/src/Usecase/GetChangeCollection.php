<?php
namespace MyApp\Usecase;

use MyApp\Entity\Change;
use PHPMentors\DomainKata\Entity\EntityCollectionInterface;
use MyApp\Distribution\AbstractChangeDistributer;

class GetChangeCollection
{
    protected $distributer;
    public function __construct(AbstractChangeDistributer $distributer)
    {
        $this->distributer = $distributer;
    }

    public function run(Change $change, EntityCollectionInterface $collection)
    {
        return $this->distributer->disribution($change, $collection);
    }
}