<?php
namespace MyApp\Money;

interface Expression
{
    public function reduce(String $to);

}