<?php
namespace myapp\Cat;

use PHPMentors\DomainKata\Entity\EntityInterface;
use PHPMentors\DomainKata\Entity\EntityCollectionInterface;
use myapp\Enum\Favorite;
use myapp\Enum\Drink;

interface CatInterface
{

    /**
     * 飲む
     * おいしくなかったら逃げる
     */
    public function drink(Drink $drink);

    /**
     * 食べる
     */
    public function eat(EntityInterface $food);

    /**
     * 興味を示す
     */
    public function interest(Favorite $favorite);

    /**
     * ひっかく
     */
    public function scratch();

    /**
     * 逃げる
     */
    public function escape();

    /**
     * 近寄ってくる
     */
    public function drawnear();
}