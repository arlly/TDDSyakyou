<?php
namespace myapp\Enum;

final class Action
{
    const ENUM =
    [
        'INTEREST' => '興味あり',
        'SCRATCH' => 'ひっかく！！！',
        'ESCAPE' => '逃げる！',
        'DRAWNEAR' => '近寄る',
    ];

    private $scalar;

    public function __construct($key)
    {
    //
        if (! static::isValidValue($key)) {
            throw new \InvalidArgumentException();
        }

        $this->scalar = self::ENUM[$key];
    }


    public static function isValidValue($key)
    {
        return array_key_exists($key, self::ENUM);
    }

    public function __toString()
    {
        return $this->scalar;
    }

    public static function __callStatic($method, array $args)
    {
        return new self($method);
    }

    public function __set($key, $value)
    {
        throw new \BadMethodCallException('All setter is forbbiden');
    }
}