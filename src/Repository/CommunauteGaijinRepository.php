<?php

namespace App\Repository;

use App\Entity\CommunauteGaijin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CommunauteGaijin|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommunauteGaijin|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommunauteGaijin[]    findAll()
 * @method CommunauteGaijin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommunauteGaijinRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CommunauteGaijin::class);
    }

    // /**
    //  * @return CommunauteGaijin[] Returns an array of CommunauteGaijin objects
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
    public function findOneBySomeField($value): ?CommunauteGaijin
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
