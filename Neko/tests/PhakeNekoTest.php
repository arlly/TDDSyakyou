<?php
use myapp\Person\PersonInterface;
use myapp\Cat\CatInterface;
use myapp\Enum\Favorite;

require_once "vendor/autoload.php";

class PhakeNekoTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        parent::setUp();
    }
    
    /**
     * @test
     */
    public function 色々あげてみるテスト()
    {
        $mockNeko = Phake::mock('CatInterface');
        Phake::when($mockNeko)->drawnear()->thenReturn(50);
        
        Phake::verify($mockNeko, Phake::times(2))->interest(Phake::anyParameters());
    }

    
}
