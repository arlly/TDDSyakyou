<?php
namespace MyApp\entity;

use PHPMentors\DomainKata\Entity\EntityCollectionInterface;
use PHPMentors\DomainKata\Entity\EntityInterface;

class EvaluationCollection implements EntityCollectionInterface
{

    protected $evaluation;

    public function add(EntityInterface $entity)
    {
        $this->evaluation[] = $entity;
        return $this;
    }

    public function getIterator()
    {
        //
    }

    public function get($key)
    {
        return $this->evaluation[$key];
    }

    public function toArray()
    {
        //
    }

    public function count()
    {
        //
    }

    public function remove(EntityInterface $entity)
    {
        //
    }
}