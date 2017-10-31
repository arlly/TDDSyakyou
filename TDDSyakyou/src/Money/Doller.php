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

    public function times(int $multipier)
    {
        $this->amount *= $multipier;
    }
}