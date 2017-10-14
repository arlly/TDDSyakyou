<?php
namespace MyApp\Distribution;

use MyApp\Entity\Change;
use MyApp\Entity\CurrencyCollection;

abstract class ChangeDistributer
{

    public function disribution(Change $change, CurrencyCollection $currencies)
    {
        $remaining = $change->getChange();

        for ($i = 0; $i < $currencies->count(); $i ++) {
            $money = $currencies->get($i);
            $moneyCount = (int) floor($remaining / $money->getValue());

            if ($moneyCount <= 0) {
                continue;
            }

            /**
             * 在庫が足りなければ *
             */
            if ($moneyCount > $money->getStock()) {
                $moneyCount = $money->getStock();
                $changeCollection['errorMessage'] = $this->setErrorMessage($money->getName());

            }

            $changeCollection[$money->getName()] = $moneyCount;
            $remaining -= ($money->getValue() * $moneyCount);

            if ($remaining == 0) {
                break;
            }
        }

        return $changeCollection;
    }

    abstract protected function setErrorMessage($name);
}