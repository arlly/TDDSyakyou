<?php
use myapp\Person\PersonInterface;
use myapp\Cat\CatInterface;
use myapp\Enum\Favorite;

require_once "vendor/autoload.php";

class DrawAttentionTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        parent::setUp();
    }

    public function testDrawAttention()
    {
        $bool = TRUE;

        $mockPerson = $this->createMock(PersonInterface::class);
        $mockCat =  $this->createMock(CatInterface::class);

        $mockPerson->method('attentionToCat')->willReturn("興味あり");

        $usecase = new myapp\UseCases\DrawAttentionToCat($mockPerson, $mockCat);

        $this->assertTrue($usecase->run(Favorite::CHOROQ()));
    }

    public function testDrawAttentionFalse()
    {
        $bool = TRUE;

        $mockPerson = $this->createMock(PersonInterface::class);
        $mockCat =  $this->createMock(CatInterface::class);

        $mockPerson->method('attentionToCat')->willReturn("引っかく");

        $usecase = new myapp\UseCases\DrawAttentionToCat($mockPerson, $mockCat);

        $this->assertFalse($usecase->run(Favorite::MATATABI()));
    }

    /**
     * @expectedException InvalidArgumentException
     * そもそもあげたらだめなやつをあげちゃうテスト
     */
    public function testEnumException()
    {
        $favorite = new Favorite('チョコレート');

        $bool = TRUE;

        $mockPerson = $this->createMock(PersonInterface::class);
        $mockCat =  $this->createMock(CatInterface::class);

        $mockPerson->method('attentionToCat')->willReturn("興味あり");

        $usecase = new myapp\UseCases\DrawAttentionToCat($mockPerson, $mockCat);

        $this->assertTrue($usecase->run($favorite));
    }
}
