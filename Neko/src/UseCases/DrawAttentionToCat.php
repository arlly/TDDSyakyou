<?php
namespace myapp\UseCases;

use myapp\Person\PersonInterface;
use myapp\Cat\CatInterface;
use myapp\Enum\Favorite;
use myapp\Enum\Action;

class DrawAttentionToCat
{

    protected $arimoto;

    protected $tama;

    public function __construct(PersonInterface $person, CatInterface $cat)
    {
        $this->arimoto = $person;
        $this->tama = $cat;
    }

    public function run(Favorite $favorite)
    {
        $interest = $this->arimoto->attentionToCat($this->tama, $favorite);

        if ($interest == "興味あり") {
            return true;
        } else {
            return false;
        }
    }
}