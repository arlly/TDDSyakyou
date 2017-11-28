<?php
namespace MyApp\Money;

class Pair
{
    /**
     * String
     */
    private $from;

    /**
     * String
     */
    private $to;


    public function __construct(String $from, String $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * @param Pair $pair
     * @return bool
     */
    public function equals(Pair $pair): bool
    {
        return $this->from == $pair->from && $this->to == $pair->to;
    }

    /**
     * return int
     */
    public function hashCode(): int
    {
        return 0;
    }


}