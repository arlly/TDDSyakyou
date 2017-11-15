<?php
namespace MyApp\Money;

class Bank
{
    public function reduce(Expression $source, String $to): Money
    {
        return $source->reduce($to);
    }
}