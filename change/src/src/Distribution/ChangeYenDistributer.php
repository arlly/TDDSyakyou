<?php
namespace MyApp\Distribution;

use MyApp\Entity\Change;
use MyApp\Entity\CurrencyCollection;

class ChangeYenDistributer extends ChangeDistributer
{

    protected function setErrorMessage($name)
    {
        return "申し訳ありません。{$name}はご用意出来ませんでした。";
    }
}