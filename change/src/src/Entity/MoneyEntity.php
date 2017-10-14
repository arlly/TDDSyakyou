<?php
namespace MyApp\Entity;

use PHPMentors\DomainKata\Entity\EntityInterface;

class MoneyEntity implements EntityInterface
{
    protected $name;

    protected $value;

    protected $stock;

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }


    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }



    public function setStock($stock)
    {
        $this->stock = $stock;
        return $this;
    }

    public function getStock()
    {
        return $this->stock;
    }


}