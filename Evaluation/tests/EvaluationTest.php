<?php
use MyApp\entity\Evaluation;

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




}