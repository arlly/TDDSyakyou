<?php
namespace MyApp\Entity;

class TotalPrice
{
    protected $totalPrice;

    public function __construct(float $value)
    {
        if ($value < 0) {
            throw new \Exception('不正な価格');
        }
        $this->totalPrice = $value;

    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }


}