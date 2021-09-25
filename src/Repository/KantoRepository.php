<?php

namespace App\Repository;

use App\Entity\Kanto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Kanto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kanto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kanto[]    findAll()
 * @method Kanto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KantoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Kanto::class);
    }

    // /**
    //  * @return Kanto[] Returns an array of Kanto objects
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
    public function findOneBySomeField($value): ?Kanto
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
