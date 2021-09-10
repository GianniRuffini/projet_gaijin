<?php

namespace App\Repository;

use App\Entity\Hebergements;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Hebergements|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hebergements|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hebergements[]    findAll()
 * @method Hebergements[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HebergementsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hebergements::class);
    }

    // /**
    //  * @return Hebergements[] Returns an array of Hebergements objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Hebergements
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
