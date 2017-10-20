<?php
namespace MyApp\Config;

final class ConfigCurrencies
{
    const ENUM =
    [
        'YEN' => 'yen',
        'DOLL' => 'doll',
        'EURO' => 'euro',
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