<?php
use myapp\Enum\Favorite;

require_once "vendor/autoload.php";

class EnumTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        parent::setUp();
    }

    public function testEnum()
    {
        $favorite = Favorite::CHOROQ();
        $this->assertEquals($favorite, 'CHOROQ');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testEnumException()
    {
        $favorite = new Favorite('uso800');
    }
}