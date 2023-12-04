<?php

namespace App\DataFixtures;

use App\Factory\RecipeFactory;
use App\Factory\RecipesCategoryFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class RecipeFixtures extends Fixture implements DependentFixtureInterface

{
    public function load(ObjectManager $manager): void
    {
        RecipeFactory::createMany(20, function () {
            return ['recipeCategory' => RecipesCategoryFactory::random()];
        });
    }

    public function getDependencies(): array
    {
        return [
            RecipeCategoryFixtures::class,
        ];
    }
}
