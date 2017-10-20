<?php
namespace MyApp\Distribution;

use MyApp\Entity\Change;
use MyApp\Entity\CurrencyCollection;
use MyApp\Exception\NoStockException;

abstract class AbstractChangeDistributer
{

    public function disribution(Change $change, CurrencyCollection $currencies)
    {
        $remaining = $change->getChange();

        for ($i = 0; $i < $currencies->count(); $i ++) {
            $money = $currencies->sortDesc()->get($i);
            $moneyCount = (int) floor(bcdiv($remaining , $money->getValue(), 3));

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

        /**
         * もし最後に0にならなければ在庫が足りていない
         */
        if ($remaining > 0) {
            throw new NoStockException("お釣りが{$remaining}足りません。店員を呼んでください");
        }

        return $changeCollection;
    }

    abstract protected function setErrorMessage($name);
}