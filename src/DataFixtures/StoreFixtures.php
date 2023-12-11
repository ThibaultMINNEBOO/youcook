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
        StoreFactory::createOne(['quantity' => 3, 'user' => UserFactory::find(1), 'ingredients' => IngredientFactory::find(1)]);
        StoreFactory::createOne(['quantity' => 2, 'user' => UserFactory::find(1), 'ingredients' => IngredientFactory::find(2)]);
        StoreFactory::createOne(['quantity' => 7, 'user' => UserFactory::find(1), 'ingredients' => IngredientFactory::find(3)]);
    }

    public function getDependencies(): array
    {
        return [
            IngredientFixtures::class,
        ];
    }
}
