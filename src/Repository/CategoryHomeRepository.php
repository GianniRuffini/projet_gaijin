<?php

namespace App\Repository;

use App\Entity\CategoryHome;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategoryHome|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryHome|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryHome[]    findAll()
 * @method CategoryHome[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryHomeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoryHome::class);
    }

    // /**
    //  * @return CategoryHome[] Returns an array of CategoryHome objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CategoryHome
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
