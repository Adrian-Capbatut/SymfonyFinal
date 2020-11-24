<?php

namespace App\Repository;

use App\Entity\Calatori;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Calatori|null find($id, $lockMode = null, $lockVersion = null)
 * @method Calatori|null findOneBy(array $criteria, array $orderBy = null)
 * @method Calatori[]    findAll()
 * @method Calatori[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CalatoriRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Calatori::class);
    }

    // /**
    //  * @return Calatori[] Returns an array of Calatori objects
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
    public function findOneBySomeField($value): ?Calatori
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
