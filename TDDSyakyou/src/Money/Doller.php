<?php
namespace MyApp\Money;

class Doller extends Money
{



    public function times(int $multipier): Money
    {
        //return Money::dollar($this->amount * $multipier);
        return new Doller($this->amount * $multipier, $this->currency);
    }




}