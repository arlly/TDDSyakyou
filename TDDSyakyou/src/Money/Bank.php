<?php
namespace MyApp\Money;

class Bank
{
    /** @var  array|int[] */
    private $rates;

    public function reduce(Expression $source, String $to): Money
    {
        return $source->reduce($this, $to);
    }

    public function addRate(String $from, String $to, int $rate)
    {
        $this->rates[(new Pair($from, $to))->hashCode()] = $rate;

    }

    /**
     * @param string $from
     * @param string $to
     * @return int
     */
    public function rate(String $from, String $to): int
    {
        if ($from == $to) return 1;
        return  $this->rates[(new Pair($from, $to))->hashCode()];
    }
}