<?php
namespace MyApp\Money;

abstract class Money
{
    protected $amount;
    protected $currency;

    public function __construct(int $amount, $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public abstract function times(int $multipier): Money;

    public function equals(Money $money)
    {
        /**
         * どっちがいいかな？？
         */
        return $this->amount == $money->amount && get_class($this) == get_class($money);
        //return $this->amount == $money->amount && ($this instanceof $money);
    }

    public static function dollar(int $amount): Money
    {
        return new Doller($amount, 'USD');
    }

    public static function franc(int $amount): Money
    {
        return new Franc($amount, 'CHF');
    }

    public function currency()
    {
        return $this->currency;
    }


}