<?php
namespace MyApp\Money;

class Money
{
    protected $amount;

    public function equals(Money $money)
    {
        /**
         * どっちがいいかな？？
         */
        return $this->amount == $money->amount && get_class($this) == get_class($money);
        //return $this->amount == $money->amount && ($this instanceof $money);
    }


}