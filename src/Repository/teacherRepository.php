<?php

namespace App\Repository;

use App\Entity\teacher;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method teacher|null find($id, $lockMode = null, $lockVersion = null)
 * @method teacher|null findOneBy(array $criteria, array $orderBy = null)
 * @method teacher[]    findAll()
 * @method teacher[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class teacherRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, teacher::class);
    }


    public function findTeacher(teacher $teacher)
    {
        return $this->createQueryBuilder('user')
            ->andWhere('user.roles = :ROLE_STUDY')
            ->setParameter('ROLE_STUDY', $teacher)
            ->getQuery()
            ->execute();

    }


    // /**
    //  * @return teacher[] Returns an array of teacher objects
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
    public function findOneBySomeField($value): ?teacher
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
