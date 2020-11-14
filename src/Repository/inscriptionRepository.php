<?php

namespace App\Repository;

use App\Entity\inscription;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method inscription|null find($id, $lockMode = null, $lockVersion = null)
 * @method inscription|null findOneBy(array $criteria, array $orderBy = null)
 * @method inscription[]    findAll()
 * @method inscription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class inscriptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, inscription::class);
    }

    // /**
    //  * @return inscription[] Returns an array of inscription objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?inscription
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
