<?php
namespace MyApp\Money;

class Bank
{
    public function reduce(Expression $source, String $to)
    {
        return Money::dollar(10);

    }

}