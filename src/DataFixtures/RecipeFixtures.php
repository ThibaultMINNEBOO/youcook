<?php

namespace App\DataFixtures;

use App\Factory\ConstituteFactory;
use App\Factory\IngredientFactory;
use App\Factory\RecipeFactory;
use App\Factory\RecipesCategoryFactory;
use App\Factory\StepFactory;
use App\Factory\ToolFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RecipeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $recipes = json_decode(file_get_contents(__DIR__.'/data/Recipes.json'), true);
        $tools = ToolFactory::createSequence([
            ['name' => 'couteau'],
            ['name' => 'cuillère'],
            ['name' => 'assiette'],
        ]);
        $steps = StepFactory::createSequence([
            [
                'name' => 'Préparer les tranches de pain',
                'description' => 'Tranchez le pain assez grossièrement',
            ],
            [
                'name' => 'Préparation du mélange liquide',
                'description' => 'Dans un grand plat, mélanger 3 œufs avec 150 ml de lait, 2 cuillères à soupe de sucre et une pincée de sel',
            ],
            [
                'name' => 'Tremper le pain',
                'description' => 'Poser les tranches de pain dans le plat contenant le mélange liquide, les laisser tremper pendant environ 10 minutes, les retourner et les laisser tremper à nouveau pendant environ 10 minutes',
            ],
            [
                'name' => 'Cuisson',
                'description' => 'Faire fondre du beurre dans une poêle. Faire dorer les tranches de pain par portions pendant environ 2 minutes de chaque côté',
            ],
            [
                'name' => 'Service',
                'description' => 'Saupoudrer les tranches de pain avec un mélange de sucre et de cannelle. Servir chaud et déguster',
            ],
        ]);
        $constitute = ConstituteFactory::createOne([
                'measure' => 'kg',
                'quantity' => 10.5,
                'ingredients' => IngredientFactory::createSequence([
                    ['name' => 'pain'],
                    ['name' => 'lait'],
                    ['name' => 'sucre'],
                ]),
            ]);

        RecipeFactory::createOne([
            'name' => 'Pain perdu',
            'description' => "La recette du poulet rôti au four est un grand classique de la cuisine. Cette recette traditionnelle est un plat convivial et apprécié de tous. C'est une option savoureuse et relativement simple pour un délicieux repas en famille ou entre amis",
            'tools' => $tools,
            'steps' => $steps,
            'day' => 0,
            'hour' => 0,
            'minute' => 20,
            'constitute' => $constitute,
        ]);

        foreach ($recipes as $recipe) {
            RecipeFactory::createOne([
                'name' => $recipe['name'],
                'recipeCategory' => RecipesCategoryFactory::new(),
                'description' => $recipe['description'] ?? '',
                'tools' => $tools,
                'steps' => StepFactory::createMany(5, ['description' => 'description d\'étape de test']),
            ]);
        }
    }

    public function getDependencies(): array
    {
        return [
            RecipeCategoryFixtures::class,
            StepFixtures::class,
        ];
    }
}
