<?php

namespace App\DataFixtures;

use App\Factory\StoreFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StoreFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        StoreFactory::createOne(['id' => 1, 'quantity' => 7]);
        StoreFactory::createOne(['id' => 2, 'quantity' => 1]);
    }
}
