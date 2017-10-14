<?php
use Pimple\Container;
use MyApp\Distribution\ChangeDistributer;
use MyApp\Entity\Change;
use MyApp\Usecase\GetChangeCollection;
use MyApp\Entity\CurrencyCollection;
use MyApp\Entity\MoneyEntity;
use MyApp\Distribution\ChangeYenDistributer;
use MyApp\Distribution\ChangeDollDistributer;

class PimpleTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function Pimpleのテスト()
    {
        $listMoney = [
            ['name' => '500円',
                'value' => 500,
                'stock' => 0
            ],
            ['name' => '100円',
                'value' => 100,
                'stock' => 50
            ],
            ['name' => '50円',
                'value' => 50,
                'stock' => 50
            ],
            ['name' => '10円',
                'value' => 10,
                'stock' => 50
            ],
            ['name' => '5円',
                'value' => 5,
                'stock' => 50
            ],
            ['name' => '1円',
                'value' => 1,
                'stock' => 50
            ]
        ];

        $currency = new CurrencyCollection();

        foreach ($listMoney as $money) {
            $moneyEntity = (new MoneyEntity())->setName($money['name'])->setValue($money['value'])->setStock($money['stock']);

            $currency->add($moneyEntity);
        }

        $change = new Change(798);

        $container = new Container();
        $container['yen.distributer'] = function ($container) {
            $distributer = new ChangeYenDistributer();
            return $distributer;
        };

        $container['usecase.distribution'] = function ($container) {
            $usecase = new GetChangeCollection($container['yen.distributer']);
            return $usecase;
        };

        $changeCollection = ($container['usecase.distribution'])->run($change, $currency);

        $this->assertEquals($changeCollection["100円"], 7);

        var_dump($changeCollection);
    }

    /**
     * @test
     */
    public function 通貨をドルにしてみるテスト()
    {
        $listMoney = [
            ['name' => '$20',
                'value' => 20,
                'stock' => 10
            ],
            ['name' => '$10',
                'value' => 10,
                'stock' => 50
            ],
            ['name' => '$5',
                'value' => 5,
                'stock' => 50
            ],
            ['name' => '$1',
                'value' => 1,
                'stock' => 50
            ],
            ['name' => '25¢',
                'value' => 0.25,
                'stock' => 50
            ],
            ['name' => '10¢',
                'value' => 0.1,
                'stock' => 50
            ],
            ['name' => '5¢',
                'value' => 0.05,
                'stock' => 50
            ],
            ['name' => '1¢',
                'value' => 0.01,
                'stock' => 50
            ]
        ];

        $currency = new CurrencyCollection();

        foreach ($listMoney as $money) {
            $moneyEntity = (new MoneyEntity())->setName($money['name'])->setValue($money['value'])->setStock($money['stock']);

            $currency->add($moneyEntity);
        }

        /** (40-32.48) **/
        $change = new Change(7.52);

        $container = new Container();
        $container['doll.distributer'] = function ($container) {
            $distributer = new ChangeDollDistributer();
            return $distributer;
        };

        $container['usecase.distribution'] = function ($container) {
            $usecase = new GetChangeCollection($container['doll.distributer']);
            return $usecase;
        };

        $changeCollection = ($container['usecase.distribution'])->run($change, $currency);

        $this->assertEquals($changeCollection['$5'], 1);

        var_dump($changeCollection);

    }

    /**
     * @test
     */
    public function 紙幣の在庫が足りないテスト()
    {
        $listMoney = [
            ['name' => '$20',
                'value' => 20,
                'stock' => 10
            ],
            ['name' => '$10',
                'value' => 10,
                'stock' => 50
            ],
            ['name' => '$5',
                'value' => 5,
                'stock' => 0
            ],
            ['name' => '$1',
                'value' => 1,
                'stock' => 50
            ],
            ['name' => '25¢',
                'value' => 0.25,
                'stock' => 50
            ],
            ['name' => '10¢',
                'value' => 0.1,
                'stock' => 50
            ],
            ['name' => '5¢',
                'value' => 0.05,
                'stock' => 50
            ],
            ['name' => '1¢',
                'value' => 0.01,
                'stock' => 50
            ]
        ];

        $currency = new CurrencyCollection();

        foreach ($listMoney as $money) {
            $moneyEntity = (new MoneyEntity())->setName($money['name'])->setValue($money['value'])->setStock($money['stock']);

            $currency->add($moneyEntity);
        }

        /** (40-32.48) **/
        $change = new Change(7.52);

        $container = new Container();
        $container['doll.distributer'] = function ($container) {
            $distributer = new ChangeDollDistributer();
            return $distributer;
        };

        $container['usecase.distribution'] = function ($container) {
            $usecase = new GetChangeCollection($container['doll.distributer']);
            return $usecase;
        };

        $changeCollection = ($container['usecase.distribution'])->run($change, $currency);

        $this->assertEquals($changeCollection['$1'], 7);

        var_dump($changeCollection);

    }

    /**
     * @expectedException NoStockException
     */
    public function お釣りが足りない例外()
    {
        $listMoney = [
            ['name' => '500円',
                'value' => 500,
                'stock' => 0
            ],
            ['name' => '100円',
                'value' => 100,
                'stock' => 0
            ],
            ['name' => '50円',
                'value' => 50,
                'stock' => 0
            ],
            ['name' => '10円',
                'value' => 10,
                'stock' => 50
            ],
            ['name' => '5円',
                'value' => 5,
                'stock' => 0
            ],
            ['name' => '1円',
                'value' => 1,
                'stock' => 50
            ]
        ];

        $currency = new CurrencyCollection();

        foreach ($listMoney as $money) {
            $moneyEntity = (new MoneyEntity())->setName($money['name'])->setValue($money['value'])->setStock($money['stock']);

            $currency->add($moneyEntity);
        }

        $change = new Change(798);

        $container = new Container();
        $container['yen.distributer'] = function ($container) {
            $distributer = new ChangeYenDistributer();
            return $distributer;
        };

        $container['usecase.distribution'] = function ($container) {
            $usecase = new GetChangeCollection($container['yen.distributer']);
            return $usecase;
        };

        $changeCollection = ($container['usecase.distribution'])->run($change, $currency);

        $this->assertEquals($changeCollection["100円"], 7);

    }
}