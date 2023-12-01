<?php

namespace App\Repository;

use App\Entity\Compose;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Compose>
 *
 * @method Compose|null find($id, $lockMode = null, $lockVersion = null)
 * @method Compose|null findOneBy(array $criteria, array $orderBy = null)
 * @method Compose[]    findAll()
 * @method Compose[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComposeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Compose::class);
    }
}
