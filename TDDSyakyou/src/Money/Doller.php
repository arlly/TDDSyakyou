<?php
namespace MyApp\Money;

class Doller
{

    public $amount;

    public function __construct(int $amount)
    {
        //
        $this->amount = $amount;
    }

    public function times(int $multipier): Doller
    {
        return new Doller($this->amount * $multipier);
    }

    public function equals(Doller $object)
    {
        return $this->amount == $object->amount;
    }
}