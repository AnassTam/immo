<?php

namespace App\Repository;

use App\Entity\Lebien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Lebien|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lebien|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lebien[]    findAll()
 * @method Lebien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LebienRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lebien::class);
    }

    // /**
    //  * @return Lebien[] Returns an array of Lebien objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Lebien
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
