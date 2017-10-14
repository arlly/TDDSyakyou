<?php


use Pimple\Container;
use MyApp\Distribution\ChangeDistributer;
use MyApp\Entity\Change;
use MyApp\Usecase\GetChangeCollection;
use MyApp\Entity\CurrencyCollection;
use MyApp\Entity\MoneyEntity;

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
        $container['distributer'] = function($container) {
            $distributer = new ChangeDistributer();
            return $distributer;
        };

        $container['usecase.distribution'] = function($container) {
            $usecase = new GetChangeCollection($container['distributer']);
            return $usecase;
        };

        $changeCollection = ($container['usecase.distribution'])->run($change, $currency);

        $this->assertEquals($changeCollection["100円"], 7);



    }


}