<?php

namespace App\Repository;

use App\Entity\FeteJaponaise;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FeteJaponaise|null find($id, $lockMode = null, $lockVersion = null)
 * @method FeteJaponaise|null findOneBy(array $criteria, array $orderBy = null)
 * @method FeteJaponaise[]    findAll()
 * @method FeteJaponaise[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FeteJaponaiseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FeteJaponaise::class);
    }

    // /**
    //  * @return FeteJaponaise[] Returns an array of FeteJaponaise objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FeteJaponaise
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
