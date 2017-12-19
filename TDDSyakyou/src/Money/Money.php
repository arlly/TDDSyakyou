<?php
namespace MyApp\Money;

class Money implements Expression
{
    public $amount;
    protected $currency;

    public function __construct(int $amount, String $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function times(int $multipier): Expression
    {
        return new Money($this->amount * $multipier, $this->currency);
    }

    public function equals(Money $money)
    {
        return $this->amount == $money->amount && $this->currency() == $money->currency();
    }

    public static function dollar(int $amount): Money
    {
        return new Money($amount, 'USD');
    }

    public static function franc(int $amount): Money
    {
        return new Money($amount, 'CHF');
    }

    public function currency()
    {
        return $this->currency;
    }

    public function plus(Expression $addend): Expression
    {
        return new Sum($this, $addend);

    }

    public function reduce(Bank $bank, String $to): Money
    {
        $rate = $bank->rate($this->currency, $to);
        return new Money($this->amount / $rate,  $to);
    }

    public function toString()
    {
        return $this->amount. " ". $this->currency;
    }

}