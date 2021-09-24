<?php

namespace App\Repository;

use App\Entity\TelephoneEtInternetAuJapon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TelephoneEtInternetAuJapon|null find($id, $lockMode = null, $lockVersion = null)
 * @method TelephoneEtInternetAuJapon|null findOneBy(array $criteria, array $orderBy = null)
 * @method TelephoneEtInternetAuJapon[]    findAll()
 * @method TelephoneEtInternetAuJapon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TelephoneEtInternetAuJaponRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TelephoneEtInternetAuJapon::class);
    }

    // /**
    //  * @return TelephoneEtInternetAuJapon[] Returns an array of TelephoneEtInternetAuJapon objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TelephoneEtInternetAuJapon
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
