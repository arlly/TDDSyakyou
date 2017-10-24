<?php
namespace MyApp\Repository;

use PHPMentors\DomainKata\Entity\EntityInterface;
use PHPMentors\DomainKata\Repository\RepositoryInterface;
use PHPMentors\DomainKata\Entity\EntityCollectionInterface;
use MyApp\Config\ConfigCurrencies;
use MyApp\Entity\CurrencyCollection;
use MyApp\Entity\MoneyEntity;
use MyApp\Config\ConfigInterface;

class CurrencyRepository implements RepositoryInterface
{
    public function getEntityCollection(ConfigInterface $config) :EntityCollectionInterface
    {
        if ($config == ConfigCurrencies::YEN()) {
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
        } elseif ($config == ConfigCurrencies::DOLL()) {
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
        }

        $currency = new CurrencyCollection();

        foreach ($listMoney as $money) {
            $moneyEntity = (new MoneyEntity())->setName($money['name'])->setValue($money['value'])->setStock($money['stock']);

            $currency->add($moneyEntity);
        }

        return $currency;
    }

    public function add(EntityInterface $entity)
    {
        //
    }

    public function remove(EntityInterface $entity)
    {
        //
    }



}