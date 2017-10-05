<?php
require_once "vendor/autoload.php";

use myapp\Test\TestClass;

class StackTest extends  PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        parent::setUp();
    }

    public function testSetName()
    {
        $exp = "Arimoto";
        $test = new TestClass();

        $test->setName($exp);

        $this->assertEquals($test->getName(), $exp);
    }
}