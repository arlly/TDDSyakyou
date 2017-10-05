<?php
namespace myapp\UseCases;

use myapp\Person\PersonInterface;
use myapp\Cat\CatInterface;
use PHPMentors\DomainKata\Entity\EntityInterface;
use myapp\Enum\Drink;

class GiveMedicineToCat
{

    protected $arimoto;

    protected $cat;

    public function __construct(PersonInterface $person, CatInterface $cat)
    {
        $this->arimoto = $person;
        $this->cat = $cat;
    }

    public function run(Drink $drink)
    {
        $reaction = $this->arimoto->giveTo($this->cat, $drink);

        if ($reaction == "おいしい！！") {
            return true;
        } elseif ("逃げる！！") {
            return false;
        }
    }
}