<?php
namespace MyApp\Distribution;

use MyApp\Entity\Change;
use MyApp\Entity\CurrencyCollection;

class ChangeDollDistributer extends ChangeDistributer
{

    protected function setErrorMessage($name)
    {
        return "Sorry.{$name} is Out of stock・・・";
    }
}