<?php

namespace App\Repository;

use App\Entity\DocumentsVendeur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DocumentsVendeur|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocumentsVendeur|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocumentsVendeur[]    findAll()
 * @method DocumentsVendeur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentsVendeurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DocumentsVendeur::class);
    }

    // /**
    //  * @return DocumentsVendeur[] Returns an array of DocumentsVendeur objects
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
    public function findOneBySomeField($value): ?DocumentsVendeur
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
