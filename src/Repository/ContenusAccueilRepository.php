<?php

namespace App\Repository;

use App\Entity\ContenusAccueil;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ContenusAccueil|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContenusAccueil|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContenusAccueil[]    findAll()
 * @method ContenusAccueil[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContenusAccueilRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContenusAccueil::class);
    }

    // /**
    //  * @return ContenusAccueil[] Returns an array of ContenusAccueil objects
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
    public function findOneBySomeField($value): ?ContenusAccueil
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
