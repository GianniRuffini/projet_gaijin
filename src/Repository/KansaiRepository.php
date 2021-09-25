<?php

namespace App\Repository;

use App\Entity\Kansai;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Kansai|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kansai|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kansai[]    findAll()
 * @method Kansai[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KansaiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Kansai::class);
    }

    // /**
    //  * @return Kansai[] Returns an array of Kansai objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Kansai
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
