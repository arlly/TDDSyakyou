<?php
namespace MyApp\Entity;

class PaymentPrice
{
    protected $paymentPrice;

    public function __construct(float $value)
    {
        if ($value < 0) {
            throw new \Exception('不正な支払い');
        }
        $this->paymentPrice = $value;

    }

    public function getPaymentPrice()
    {
        return $this->paymentPrice;
    }


}