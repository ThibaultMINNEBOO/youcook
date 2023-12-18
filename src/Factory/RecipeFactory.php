<?php

namespace App\Factory;

use App\Entity\Difficulty;
use App\Entity\Recipe;
use App\Repository\RecipeRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Recipe>
 *
 * @method        Recipe|Proxy                     create(array|callable $attributes = [])
 * @method static Recipe|Proxy                     createOne(array $attributes = [])
 * @method static Recipe|Proxy                     find(object|array|mixed $criteria)
 * @method static Recipe|Proxy                     findOrCreate(array $attributes)
 * @method static Recipe|Proxy                     first(string $sortedField = 'id')
 * @method static Recipe|Proxy                     last(string $sortedField = 'id')
 * @method static Recipe|Proxy                     random(array $attributes = [])
 * @method static Recipe|Proxy                     randomOrCreate(array $attributes = [])
 * @method static RecipeRepository|RepositoryProxy repository()
 * @method static Recipe[]|Proxy[]                 all()
 * @method static Recipe[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Recipe[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Recipe[]|Proxy[]                 findBy(array $attributes)
 * @method static Recipe[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Recipe[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class RecipeFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     *
     * @throws \Exception
     */
    protected function getDefaults(): array
    {
        /*
         * Difficulty::cases() renvoie toutes les valeurs de l’énumération
         * array_rand(Array) récupère un index aléatoire du tableau passé en paramètre
         * la combinaison des deux permet de récupérer un index aléatoire de l’énumération Difficulty
         * dans notre cas, il faut utiliser Difficulty::cases()[array_rand(Difficulty::cases())]
         *   pour récupérer une valeur aléatoire de Difficulty
         * !! L’utilisation de cette méthode n’est valable que pour des données factices !!
         */
        return [
            'name' => self::faker()->text(100),
            'difficulty' => Difficulty::cases()[array_rand(Difficulty::cases())]->name,
            'nbPeople' => self::faker()->numberBetween(1, 10),
            'mark' => MarkFactory::new(),
            'steps' => StepFactory::createMany(5),
            'recipeCategory' => RecipesCategoryFactory::new(),
            'day' => self::faker()->numberBetween(0, 30),
            'hour' => self::faker()->numberBetween(0, 23),
            'minute' => self::faker()->numberBetween(1, 59),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Recipe $recipe): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Recipe::class;
    }
}
