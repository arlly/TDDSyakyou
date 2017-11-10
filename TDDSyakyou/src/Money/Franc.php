<?php
namespace MyApp\Money;

use phpDocumentor\Reflection\Types\String_;

class Franc extends Money
{
    public function __construct(int $amount, $currency)
    {
        parent::__construct($amount, $currency);

    }





}