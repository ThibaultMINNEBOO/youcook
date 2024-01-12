<?php

namespace App\Repository;

use App\Entity\Recipe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Recipe>
 *
 * @method Recipe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Recipe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Recipe[]    findAll()
 * @method Recipe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecipeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recipe::class);
    }

    public function findWithCategory(int $id): ?array
    {
        $qb = $this->createQueryBuilder('r')
            ->leftJoin('r.recipeCategory', 'category')
            ->addSelect('category')
            ->where('category.id = :id')
            ->setParameter(':id', $id);

        $query = $qb->getQuery();

        return $query->getResult();
    }

    public function searchRecipe(string $searchValue = ''): array
    {
        $querySearch = $this->createQueryBuilder('rec')
            ->Where('rec.name LIKE :search')
            ->setParameter('search', '%'.$searchValue.'%')
            ->orderBy('rec.name', 'ASC');
        $query = $querySearch->getQuery();

        return $query->execute();
    }
}
