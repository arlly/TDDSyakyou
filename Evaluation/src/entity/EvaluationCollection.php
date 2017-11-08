<?php
namespace MyApp\entity;

use PHPMentors\DomainKata\Entity\EntityCollectionInterface;
use PHPMentors\DomainKata\Entity\EntityInterface;

class EvaluationCollection implements EntityCollectionInterface
{

    protected $evaluation;

    public function add(EntityInterface $entity)
    {
        if ($this->isEvaluated($entity->getUserId(), $entity->getProductId())) {
            return false;
        }

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

    public function getAvarage(int $productId)
    {
        $userNum = 0;
        $startAmount = 0;
        foreach ($this->evaluation as $evaluation) {
            if ($evaluation->getProductId() == $productId) {
                $startAmount += $evaluation->getStars();
                $userNum ++;
            }
        }
        return round(($startAmount / $userNum), 2);
    }

    public function getUserCount(int $productId)
    {
        $userNum = 0;

        foreach ($this->evaluation as $evaluation) {
            if ($evaluation->getProductId() == $productId) {
                $userNum ++;
            }
        }

        return $userNum;
    }

    public function isEvaluated($userId, $produtId)
    {
        foreach ($this->evaluation as $evaluation) {
            if ($evaluation->getProductId() == $produtId && $evaluation->getUserId() == $userId) {
                return true;
            }
        }

        return false;
    }
}