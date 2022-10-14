<?php

namespace App\Repository;

use App\Entity\Materielles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Materielles|null find($id, $lockMode = null, $lockVersion = null)
 * @method Materielles|null findOneBy(array $criteria, array $orderBy = null)
 * @method Materielles[]    findAll()
 * @method Materielles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MateriellesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Materielles::class);
    }

    // /**
    //  * @return Materielles[] Returns an array of Materielles objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Materielles
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
