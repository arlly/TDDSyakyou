<?php
namespace MyApp\Distribution;

use MyApp\Entity\Change;
use MyApp\Entity\CurrencyCollection;

class ChangeDollDistributer extends AbstractChangeDistributer
{

    protected function setErrorMessage($name)
    {
        return "Sorry.{$name} is Out of stock・・・";
    }
}