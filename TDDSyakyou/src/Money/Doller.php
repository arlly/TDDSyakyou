<?php
namespace MyApp\Money;

class Doller extends Money
{
    public function __construct(int $amount)
    {
        //
        $this->amount = $amount;
    }

    public function times(int $multipier): Money
    {
        return new Doller($this->amount * $multipier);
    }


}