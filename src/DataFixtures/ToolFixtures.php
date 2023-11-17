<?php

namespace App\DataFixtures;

use App\Factory\ToolFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ToolFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        ToolFactory::createMany(10);
    }
}
