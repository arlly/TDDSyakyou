<?php
namespace myapp\Test;

class TestClass
{

    protected $name;

    public function setName($value)
    {
        $this->name = $value;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }
}