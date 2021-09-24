<?php

namespace App\Repository;

use App\Entity\CuisineJaponaise;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CuisineJaponaise|null find($id, $lockMode = null, $lockVersion = null)
 * @method CuisineJaponaise|null findOneBy(array $criteria, array $orderBy = null)
 * @method CuisineJaponaise[]    findAll()
 * @method CuisineJaponaise[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CuisineJaponaiseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CuisineJaponaise::class);
    }

    // /**
    //  * @return CuisineJaponaise[] Returns an array of CuisineJaponaise objects
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
    public function findOneBySomeField($value): ?CuisineJaponaise
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
