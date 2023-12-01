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
        IngredientFactory::createOne(['name' => 'Salade']);
        IngredientFactory::createOne(['name' => 'Sel']);
        IngredientFactory::createOne(['name' => 'Tomate']);
        IngredientFactory::createOne(['name' => 'Pomme de terre vitelotte']);
        IngredientFactory::createOne(['name' => 'Vinaigre']);
        IngredientFactory::createOne(['name' => 'Abricot']);
        IngredientFactory::createOne(['name' => 'Rhum']);
        IngredientFactory::createMany(0, function () {
            return [
                'category' => IngredientCategoryFactory::faker()->boolean(70) ? IngredientCategoryFactory::random() : null,
            ];
        });
    }

    public function getDependencies(): array
    {
        return [
            IngredientCategoryFixtures::class,
            ConstituteFixtures::class,
        ];
    }
}
