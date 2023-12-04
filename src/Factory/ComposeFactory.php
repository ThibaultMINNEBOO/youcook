<?php

namespace App\Factory;

use App\Entity\Compose;
use App\Repository\ComposeRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Compose>
 *
 * @method        Compose|Proxy                     create(array|callable $attributes = [])
 * @method static Compose|Proxy                     createOne(array $attributes = [])
 * @method static Compose|Proxy                     find(object|array|mixed $criteria)
 * @method static Compose|Proxy                     findOrCreate(array $attributes)
 * @method static Compose|Proxy                     first(string $sortedField = 'id')
 * @method static Compose|Proxy                     last(string $sortedField = 'id')
 * @method static Compose|Proxy                     random(array $attributes = [])
 * @method static Compose|Proxy                     randomOrCreate(array $attributes = [])
 * @method static ComposeRepository|RepositoryProxy repository()
 * @method static Compose[]|Proxy[]                 all()
 * @method static Compose[]|Proxy[]                 createMany(int $number, array|callable $attributes = [])
 * @method static Compose[]|Proxy[]                 createSequence(iterable|callable $sequence)
 * @method static Compose[]|Proxy[]                 findBy(array $attributes)
 * @method static Compose[]|Proxy[]                 randomRange(int $min, int $max, array $attributes = [])
 * @method static Compose[]|Proxy[]                 randomSet(int $number, array $attributes = [])
 */
final class ComposeFactory extends ModelFactory
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
            'stepNumber' => self::faker()->randomNumber(),
            'step' => StepFactory::random(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Compose $compose): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Compose::class;
    }
}
