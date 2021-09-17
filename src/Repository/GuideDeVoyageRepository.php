<?php

namespace App\Repository;

use App\Entity\GuideDeVoyage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GuideDeVoyage|null find($id, $lockMode = null, $lockVersion = null)
 * @method GuideDeVoyage|null findOneBy(array $criteria, array $orderBy = null)
 * @method GuideDeVoyage[]    findAll()
 * @method GuideDeVoyage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GuideDeVoyageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GuideDeVoyage::class);
    }

    // /**
    //  * @return GuideDeVoyage[] Returns an array of GuideDeVoyage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GuideDeVoyage
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
