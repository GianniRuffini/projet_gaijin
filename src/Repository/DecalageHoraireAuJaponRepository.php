<?php

namespace App\Repository;

use App\Entity\DecalageHoraireAuJapon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DecalageHoraireAuJapon|null find($id, $lockMode = null, $lockVersion = null)
 * @method DecalageHoraireAuJapon|null findOneBy(array $criteria, array $orderBy = null)
 * @method DecalageHoraireAuJapon[]    findAll()
 * @method DecalageHoraireAuJapon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DecalageHoraireAuJaponRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DecalageHoraireAuJapon::class);
    }

    // /**
    //  * @return DecalageHoraireAuJapon[] Returns an array of DecalageHoraireAuJapon objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DecalageHoraireAuJapon
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
