<?php

namespace App\DataFixtures;

use App\Entity\Step;
use App\Factory\StepFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StepFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        StepFactory::createMany(10);
        // $product = new Product();
        // $manager->persist($product);

    }
}
