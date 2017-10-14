<?php
use MyApp\Entity\CurrencyCollection;
use MyApp\Entity\MoneyEntity;



class EntityTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function エンティティのテスト()
    {
        $listMoney = [
            ['name' => '10000円',
             'value' => 10000,
             'stock' => 50
            ],
            ['name' => '5000円',
                'value' => 5000,
                'stock' => 50
            ],
            ['name' => '1000円',
                'value' => 1000,
                'stock' => 50
            ],
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

        $this->assertEquals(9, $currency->count());

        $moneyEntity = $currency->get(0);
        $this->assertEquals(10000, $moneyEntity->getValue());


    }
}