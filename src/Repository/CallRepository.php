<?php

namespace App\Repository;

use App\Entity\Call;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Call|null find($id, $lockMode = null, $lockVersion = null)
 * @method Call|null findOneBy(array $criteria, array $orderBy = null)
 * @method Call[]    findAll()
 * @method Call[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)

 */
class CallRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Call::class);
    }

    // /**
    //  * @return Call[] Returns an array of Call objects
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

    /**
     *
     */



    public function findHour() {
        return $this->createQueryBuilder('e')->
            orderBy('e.hour', 'DESC')->
            setMaxResults(3)->
            getQuery()->
            getResult();
        }

        /**
         * @return void
         */
        public function search($status = null){
            $query = $this->createQueryBuilder('a');

            if($status != null){
                $query->leftJoin('a.status', 'c');
                $query->andWhere('c.id = :id')
                    ->setParameter('id', $status);
            }
            return $query->getQuery()->getResult();
        }


    /*
    public function findOneBySomeField($value): ?Call
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
