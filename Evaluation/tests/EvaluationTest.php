<?php
use MyApp\entity\Evaluation;
use MyApp\entity\EvaluationCollection;

class EvaluationTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function エンティティのテスト()
    {
        $eval = new Evaluation(1, 1, 5);
        $this->assertEquals($eval->getProductId(), 1);
    }

    /**
     * @test
     */
    public function コレクションのテスト()
    {
        $listEvaluation = [
            [
                'productId' =>1,
                'userId' => 1,
                'stars' => 3
            ],
            [
                'productId' =>2,
                'userId' => 2,
                'stars' => 4
            ],
            [
                'productId' =>1,
                'userId' => 3,
                'stars' => 2
            ]
        ];

        $collection = new EvaluationCollection();

        foreach ($listEvaluation as $evaluation) {
            $eval = new Evaluation($evaluation['productId'], $evaluation['userId'], $evaluation['stars']);
            $collection->add($eval);
        }

        $this->assertEquals($collection->get(0)
            ->getProductId(), 1);
    }

    /**
     * @test
     */
    public function 平均値のテスト()
    {
        $listEvaluation = [
            [
                'productId' =>1,
                'userId' => 1,
                'stars' => 3
            ],
            [
                'productId' =>1,
                'userId' => 2,
                'stars' => 4
            ],
            [
                'productId' =>1,
                'userId' => 3,
                'stars' => 2
            ]
        ];

        $collection = new EvaluationCollection();

        foreach ($listEvaluation as $evaluation) {
            $eval = new Evaluation($evaluation['productId'], $evaluation['userId'], $evaluation['stars']);
            $collection->add($eval);
        }

        $this->assertEquals($collection->getAvarage(1), 3);
    }

    /**
     * @test
     */
    public function 小数点のテスト()
    {
        $listEvaluation = [
            [
                'productId' =>1,
                'userId' => 1,
                'stars' => 3
            ],
            [
                'productId' =>1,
                'userId' => 2,
                'stars' => 4
            ],
            [
                'productId' =>1,
                'userId' => 3,
                'stars' => 3
            ]
        ];

        $collection = new EvaluationCollection();

        foreach ($listEvaluation as $evaluation) {
            $eval = new Evaluation($evaluation['productId'], $evaluation['userId'], $evaluation['stars']);
            $collection->add($eval);
        }

        $this->assertEquals($collection->getAvarage(1), 3.33);
    }
}