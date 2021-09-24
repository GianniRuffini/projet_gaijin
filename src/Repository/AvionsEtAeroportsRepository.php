<?php

namespace App\Repository;

use App\Entity\AvionsEtAeroports;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AvionsEtAeroports|null find($id, $lockMode = null, $lockVersion = null)
 * @method AvionsEtAeroports|null findOneBy(array $criteria, array $orderBy = null)
 * @method AvionsEtAeroports[]    findAll()
 * @method AvionsEtAeroports[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvionsEtAeroportsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AvionsEtAeroports::class);
    }

    // /**
    //  * @return AvionsEtAeroports[] Returns an array of AvionsEtAeroports objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AvionsEtAeroports
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
