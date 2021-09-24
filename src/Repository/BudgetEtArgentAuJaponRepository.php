<?php

namespace App\Repository;

use App\Entity\BudgetEtArgentAuJapon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BudgetEtArgentAuJapon|null find($id, $lockMode = null, $lockVersion = null)
 * @method BudgetEtArgentAuJapon|null findOneBy(array $criteria, array $orderBy = null)
 * @method BudgetEtArgentAuJapon[]    findAll()
 * @method BudgetEtArgentAuJapon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BudgetEtArgentAuJaponRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BudgetEtArgentAuJapon::class);
    }

    // /**
    //  * @return BudgetEtArgentAuJapon[] Returns an array of BudgetEtArgentAuJapon objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BudgetEtArgentAuJapon
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
