<?php

namespace App\Factory;

use App\Entity\RecipesUser;
use App\Repository\RecipesUserRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<RecipesUser>
 *
 * @method        RecipesUser|Proxy                     create(array|callable $attributes = [])
 * @method static RecipesUser|Proxy                     createOne(array $attributes = [])
 * @method static RecipesUser|Proxy                     find(object|array|mixed $criteria)
 * @method static RecipesUser|Proxy                     findOrCreate(array $attributes)
 * @method static RecipesUser|Proxy                     first(string $sortedField = 'id')
 * @method static RecipesUser|Proxy                     last(string $sortedField = 'id')
 * @method static RecipesUser|Proxy                     random(array $attributes = [])
 * @method static RecipesUser|Proxy                     randomOrCreate(array $attributes = [])
 * @method static RecipesUserRepository|RepositoryProxy repository()
 * @method static RecipesUser[]|Proxy[]                 all()
 * @method static RecipesUser[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static RecipesUser[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static RecipesUser[]|Proxy[]                 findBy(array $attributes)
 * @method static RecipesUser[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static RecipesUser[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class RecipesUserFactory extends ModelFactory
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
            // ->afterInstantiate(function(RecipesUser $recipesUser): void {})
        ;
    }

    protected static function getClass(): string
    {
        return RecipesUser::class;
    }
}
