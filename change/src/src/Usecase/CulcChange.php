<?php
namespace MyApp\Usecase;

use MyApp\Entity\PaymentPrice;
use MyApp\Entity\TotalPrice;
use MyApp\Entity\Change;

class CulcChange
{
    public function culc(PaymentPrice $paymentPrice, TotalPrice $totalPrice): Change
    {
        $change = $paymentPrice->getPaymentPrice() - $totalPrice->getTotalPrice();

        return new Change($change);
    }


}