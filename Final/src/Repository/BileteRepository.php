<?php

namespace App\Repository;

use App\Entity\Bilete;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bilete|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bilete|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bilete[]    findAll()
 * @method Bilete[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BileteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bilete::class);
    }

    // /**
    //  * @return Bilete[] Returns an array of Bilete objects
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
    public function findOneBySomeField($value): ?Bilete
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
