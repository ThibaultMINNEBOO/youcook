<?php

namespace App\DataFixtures;

use App\Factory\IngredientCategoryFactory;
use App\Factory\IngredientFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class IngredientFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        IngredientFactory::createMany(20, [
            'category' => IngredientCategoryFactory::faker()->boolean(70) ? IngredientCategoryFactory::random() : null,
        ]);
    }

    public function getDependencies(): array
    {
        return [
            IngredientCategoryFixtures::class,
        ];
    }
}
