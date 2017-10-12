<?php
namespace MyApp\Entity;

class Change
{
    protected $change;

    public function __construct(float $value)
    {
        if ($value < 0) {
            throw new \Exception('不正な支払い');
        }
        $this->change = $value;

    }

    public function getChange()
    {
        return $this->change;
    }


}