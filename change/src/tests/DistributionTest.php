<?php
use MyApp\Entity\Change;
use MyApp\Entity\CurrencyCollection;
use MyApp\Entity\MoneyEntity;
use MyApp\Distribution\ChangeDistributer;
use MyApp\Usecase\GetChangeCollection;

class DistributionTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function お釣りを求めるテスト()
    {
        $change = new Change(698);

        $listMoney = [
            ['name' => '500円',
                'value' => 500,
                'stock' => 50
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

        $distributer = new ChangeDistributer();
        $changeCollection = $distributer->disribution($change, $currency);

        var_dump($changeCollection);
    }

    /**
     * @test
     */
    public function 五百円玉が無いときに100円で代用するテスト()
    {
        $change = new Change(698);

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

        $distributer = new ChangeDistributer();
        $changeCollection = $distributer->disribution($change, $currency);

        $this->assertEquals($changeCollection["100円"], 6);
    }

    /**
     * @test
     */
    public function ユースケースのテスト()
    {
        $change = new Change(698);

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

        $distributer = new ChangeDistributer();

        $changeCollection = (new GetChangeCollection($distributer))->run($change, $currency);
        $this->assertEquals($changeCollection["100円"], 6);


    }
}