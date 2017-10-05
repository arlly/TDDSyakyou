<?php
use myapp\Person\PersonInterface;
use myapp\Cat\CatInterface;
use myapp\Enum\Drink;

require_once "vendor/autoload.php";

class DrinkToMedicineTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        parent::setUp();
    }

    public function testDrinkToMedicine()
    {
        $mockPerson = $this->createMock(PersonInterface::class);
        $mockCat = $this->createMock(CatInterface::class);
        
        $mockPerson->method('giveTo')->willReturn("おいしい！！");
        
        $usecase = new myapp\UseCases\GiveMedicineToCat($mockPerson, $mockCat);
        
        $this->assertTrue($usecase->run(Drink::MILK()));
    }

    public function testDrawAttentionFalse()
    {
        $mockPerson = $this->createMock(PersonInterface::class);
        $mockCat = $this->createMock(CatInterface::class);
        
        $mockPerson->method('giveTo')->willReturn("逃げる！！");
        
        $usecase = new myapp\UseCases\GiveMedicineToCat($mockPerson, $mockCat);
        
        $this->assertFalse($usecase->run(Drink::WATER()));
    }

    

    /**
     * @expectedException InvalidArgumentException
     * そもそもあげたらだめなやつをあげちゃうテスト
     */
    public function testEnumException()
    {
        $drink = new Drink('ビール');
        
        $bool = TRUE;
        
        $mockPerson = $this->createMock(PersonInterface::class);
        $mockCat = $this->createMock(CatInterface::class);
        
        $mockPerson->method('giveTo')->willReturn("おいしい！！");
        
        $usecase = new myapp\UseCases\GiveMedicineToCat($mockPerson, $mockCat);
        
        $this->assertTrue($usecase->run(Drink::MILK()));
    }
}
