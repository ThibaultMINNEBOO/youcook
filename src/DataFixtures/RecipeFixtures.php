<?php

namespace App\DataFixtures;

use App\Factory\RecipeFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RecipeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        RecipeFactory::createMany(20, function () {
            return [
                'userRecipe' => UserFactory::random(),
                'favoriteRecipe' => UserFactory::random(),
            ];
        });
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
        ];
    }
}
