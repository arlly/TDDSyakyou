<?php
namespace MyApp\Entity;

use PHPMentors\DomainKata\Entity\EntityInterface;
use PHPMentors\DomainKata\Entity\EntityCollectionInterface;

class CurrencyCollection implements EntityCollectionInterface
{

    protected $moneyEntity;

    public function add(EntityInterface $entitiy)
    {
        if (! $entitiy instanceof MoneyEntity) {
            throw new \InvalidArgumentException();
        }

        $this->moneyEntitiy[] = $entitiy;
        return $this;
    }

    public function get($key)
    {
        return $this->moneyEntitiy[$key];
    }

    public function remove(EntityInterface $entitiy)
    {
        //
    }

    public function toArray()
    {
        json_decode(json_encode($this->moneyEntitiy), true);
    }

    public function count()
    {
        //
        return count($this->moneyEntitiy);
    }

    public function getIterator()
    {
        return new \ArrayIterator($this);
    }
}