<?php
namespace App\Package\Domain\Room;

class Charge
{

    private $value;

    public function __construct(int $value)
    {
        if ($value < 0) {
            throw new \Exception('exception!');
        }
        
        $this->value = $value;
    }

    public function getCharge()
    {
        return $this->value;
    }
}