<?php
namespace MyApp\Money;

interface Expression
{
    public function reduce(Bank $bank, String $to): Money;

}