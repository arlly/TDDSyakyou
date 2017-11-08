<?php
namespace MyApp\Money;

use phpDocumentor\Reflection\Types\String_;

class Franc extends Money
{




    public function times(int $multipier): Money
    {
        //return Money::franc($this->amount * $multipier);
        return new Franc($this->amount * $multipier, $this->currency);
    }



}