<?php
namespace myapp\Person;

use PHPMentors\DomainKata\Entity\EntityInterface;
use myapp\Cat\CatInterface;
use myapp\Enum\Favorite;
use myapp\Enum\Drink;

interface PersonInterface
{

    /**
     * ネコインスタンスに飲み物をあげる、反応をreturnする
     * @param CatInterface $cat
     * @param Drink $drink
     */
    public function giveTo(CatInterface $cat, Drink $drink);

    /**
     * ネコインスタンスに興味のあるものをsetして逃げるか近寄るかを返す
     * @param CatInterface $cat
     * @param Favorite $favorite
     */
    public function attentionToCat(CatInterface $cat, Favorite $favorite);



}