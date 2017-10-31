<?php
namespace MyApp\Money;

class Franc extends Money
{
    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function times(int $multipier): Money
    {
        return new Franc($this->amount * $multipier);
    }

}