<?php

namespace App\DataFixtures;

use App\Factory\RecipeFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        UserFactory::createOne([
            'firstname' => 'nassimUser',
            'recipes' => RecipeFactory::createMany(10),
        ]);
        UserFactory::createOne(['email' => 'root@example.com', 'firstname' => 'Thibault', 'lastname' => 'Minneboo', 'roles' => ['ROLE_ADMIN']]);
        UserFactory::createMany(20);
    }
}
