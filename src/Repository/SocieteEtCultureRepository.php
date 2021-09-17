<?php

namespace App\Repository;

use App\Entity\SocieteEtCulture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SocieteEtCulture|null find($id, $lockMode = null, $lockVersion = null)
 * @method SocieteEtCulture|null findOneBy(array $criteria, array $orderBy = null)
 * @method SocieteEtCulture[]    findAll()
 * @method SocieteEtCulture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SocieteEtCultureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SocieteEtCulture::class);
    }

    // /**
    //  * @return SocieteEtCulture[] Returns an array of SocieteEtCulture objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SocieteEtCulture
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
