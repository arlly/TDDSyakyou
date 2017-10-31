<?php
namespace MyApp\Money;

class Franc
{

    private $amount;

    public function __construct(int $amount)
    {
        //
        $this->amount = $amount;
    }

    public function times(int $multipier): Franc
    {
        return new Franc($this->amount * $multipier);
    }

    public function equals(Franc $object)
    {
        return $this->amount == $object->amount;
    }
}