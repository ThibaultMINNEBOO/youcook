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
        IngredientFactory::createOne(['name' => 'Salade', 'category' => IngredientCategoryFactory::faker()->boolean(70) ? IngredientCategoryFactory::random() : null,
        ]);
        IngredientFactory::createOne(['name' => 'Sel', 'category' => IngredientCategoryFactory::faker()->boolean(70) ? IngredientCategoryFactory::random() : null,
        ]);
        IngredientFactory::createOne(['name' => 'Tomate', 'category' => IngredientCategoryFactory::faker()->boolean(70) ? IngredientCategoryFactory::random() : null,
        ]);
        IngredientFactory::createOne(['name' => 'Pomme de terre vitelotte', 'category' => IngredientCategoryFactory::faker()->boolean(70) ? IngredientCategoryFactory::random() : null,
        ]);
        IngredientFactory::createOne(['name' => 'Vinaigre', 'category' => IngredientCategoryFactory::faker()->boolean(70) ? IngredientCategoryFactory::random() : null,
]);
        IngredientFactory::createOne(['name' => 'Abricot', 'category' => IngredientCategoryFactory::faker()->boolean(70) ? IngredientCategoryFactory::random() : null,
        ]);
        IngredientFactory::createOne(['name' => 'Rhum Brun', 'category' => IngredientCategoryFactory::faker()->boolean(70) ? IngredientCategoryFactory::random() : null,
        ]);
    }

    public function getDependencies(): array
    {
        return [
            IngredientCategoryFixtures::class,
            ConstituteFixtures::class,
        ];
    }
}
