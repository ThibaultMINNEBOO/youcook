<?php

namespace App\Factory;

use App\Entity\RecipesFavorites;
use App\Repository\RecipesFavoritesRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<RecipesFavorites>
 *
 * @method        RecipesFavorites|Proxy                     create(array|callable $attributes = [])
 * @method static RecipesFavorites|Proxy                     createOne(array $attributes = [])
 * @method static RecipesFavorites|Proxy                     find(object|array|mixed $criteria)
 * @method static RecipesFavorites|Proxy                     findOrCreate(array $attributes)
 * @method static RecipesFavorites|Proxy                     first(string $sortedField = 'id')
 * @method static RecipesFavorites|Proxy                     last(string $sortedField = 'id')
 * @method static RecipesFavorites|Proxy                     random(array $attributes = [])
 * @method static RecipesFavorites|Proxy                     randomOrCreate(array $attributes = [])
 * @method static RecipesFavoritesRepository|RepositoryProxy repository()
 * @method static RecipesFavorites[]|Proxy[]                 all()
 * @method static RecipesFavorites[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static RecipesFavorites[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static RecipesFavorites[]|Proxy[]                 findBy(array $attributes)
 * @method static RecipesFavorites[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static RecipesFavorites[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class RecipesFavoritesFactory extends ModelFactory
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
     */
    protected function getDefaults(): array
    {
        return [
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(RecipesFavorites $recipesFavorites): void {})
        ;
    }

    protected static function getClass(): string
    {
        return RecipesFavorites::class;
    }
}
