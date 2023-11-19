<?php

namespace App\DataFixtures;

use App\Factory\ComposeFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ComposeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        ComposeFactory::createMany(10);
    }
}
