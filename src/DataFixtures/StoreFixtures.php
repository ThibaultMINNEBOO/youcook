<?php

namespace App\DataFixtures;

use App\Factory\IngredientFactory;
use App\Factory\StoreFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class StoreFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        StoreFactory::createOne(['quantity' => 3, 'user' => UserFactory::createOne(), 'ingredients' => IngredientFactory::random()]);
    }

    public function getDependencies(): array
    {
        return [
            IngredientFixtures::class,
        ];
    }
}
