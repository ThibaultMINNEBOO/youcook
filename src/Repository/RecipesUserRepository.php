<?php

namespace App\Repository;

use App\Entity\RecipesUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RecipesUser>
 *
 * @method RecipesUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecipesUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecipesUser[]    findAll()
 * @method RecipesUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecipesUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecipesUser::class);
    }

//    /**
//     * @return RecipesUser[] Returns an array of RecipesUser objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?RecipesUser
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
