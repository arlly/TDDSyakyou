<?php
namespace MyApp\entity;

use PHPMentors\DomainKata\Entity\EntityInterface;

class Evaluation implements EntityInterface
{

    protected $productId;

    protected $userId;

    protected $stars;

    protected $comment;

    public function __construct(int $productId, int $userId, int $stars, $comment = null)
    {
        $this->productId = $productId;
        $this->userId = $userId;
        $this->stars = $stars;
        $this->comment = $comment;
    }

    public function getProductId()
    {
        return $this->productId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getStars()
    {
        return $this->stars;
    }

    public function getComment()
    {
        return $this->comment;
    }
}