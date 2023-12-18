<?php

namespace App\DataFixtures;

use App\Factory\ConstituteFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ConstituteFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        ConstituteFactory::createMany(10);
    }
}
