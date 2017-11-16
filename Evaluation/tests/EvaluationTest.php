<?php
use MyApp\entity\Evaluation;
use MyApp\entity\EvaluationCollection;
use MyApp\usecase\SortSpecification;
use MyApp\entity\Product;

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

    /**
     * @test
     */
    public function 評価したユーザーの数のテスト()
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

        $this->assertEquals($collection->getUserCount(1), 3);
    }

    /**
     * @test
     */
    public function 既に評価されているかの確認()
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

        $this->assertTrue($collection->isEvaluated(2, 1));
        $this->assertFalse($collection->isEvaluated(2, 2));
        $this->assertFalse($collection->isEvaluated(1, 4));
    }

    /**
     * @test
     */
    public function 同じ人が同じ商品を評価できないテスト()
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

        $evalDuplication = new Evaluation(1, 1, 5);
        $this->assertFalse($collection->add($evalDuplication));
    }

    /**
     * @test
     */
    public function たくさんんの評価を受けた星の平均値が3個のほうが一人だけの星5個より上位になる()
    {
        $usecase = new SortSpecification();
        $collection = new EvaluationCollection();

        $mockProduct = Phake::mock(Product::class);
        Phake::when($mockProduct)->getId()
             ->thenReturn(1)
             ->thenReturn(2);

        for ($i = 1; $i <= 40; $i ++) {
            $evalProduct1 = new Evaluation(1, $i, 3);
            $collection->add($evalProduct1);
        }

        $evalProduct2 = new Evaluation(2, 1, 5);
        $collection->add($evalProduct2);

        $starAvarage1 = $usecase->run($collection, $mockProduct);
        $starAvarage2 = $usecase->run($collection, $mockProduct);

        Phake::verify($mockProduct, Phake::times(2))->getId();
        $this->assertEquals($starAvarage1, 3);
        $this->assertEquals($starAvarage2, 2);
        $this->assertTrue(($starAvarage1 > $starAvarage2));
    }

    /**
     * @test
     */
    public function 商品クラスのテスト()
    {
        $mockProduct = $this->createMock(Product::class);
        $mockProduct->method('getId')->willReturn(1);

        $this->assertEquals(1, $mockProduct->getId());
    }

    /**
     * @test
     */
    public function 商品クラスと評価クラスの関係性をテスト()
    {
        $usecase = new SortSpecification();
        $mockProduct = $this->createMock(Product::class);
        $mockProduct->method('getId')->willReturn(1);

        $listEvaluation = [
            [
                'productId' =>1,
                'userId' => 1,
                'stars' => 5
            ],
            [
                'productId' =>1,
                'userId' => 2,
                'stars' => 5
            ],
            [
                'productId' =>1,
                'userId' => 3,
                'stars' => 5
            ]
        ];
        $collection = new EvaluationCollection();

        foreach ($listEvaluation as $evaluation) {
            $eval = new Evaluation($evaluation['productId'], $evaluation['userId'], $evaluation['stars']);
            $collection->add($eval);
        }

        $this->assertEquals(2, $usecase->run($collection, $mockProduct));

    }
}