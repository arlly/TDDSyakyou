<?php
namespace MyApp\usecase;

use MyApp\entity\EvaluationCollection;

class SortSpecification
{

    public function run(EvaluationCollection $collection, int $productId)
    {
        $minus = 0;

        if ($collection->getUserCount($productId) < 10) {
            $minus = 3;
        } elseif ($collection->getUserCount($productId) < 20) {
            $minus = 2;
        } elseif ($collection->getUserCount($productId) < 30) {
            $minus = 1;
        }

        return $collection->getAvarage($productId) - $minus;
    }
}