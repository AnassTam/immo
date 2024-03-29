<?php

namespace App\Repository;

use App\Entity\RealEstate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RealEstate|null find($id, $lockMode = null, $lockVersion = null)
 * @method RealEstate|null findOneBy(array $criteria, array $orderBy = null)
 * @method RealEstate[]    findAll()
 * @method RealEstate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RealEstateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RealEstate::class);
    }

    public function  findAllWiththeFilters($surface,$price,$rooms)
    {
        // Select * From real_estate WHERE surface >50
        $qb = $this->createQueryBuilder('r');
           // ->where('r.surface > :surface')
            //->andWhere('r.price <:price')
            //->andWhere('r.rooms =:rooms')
           // ->setParameters('surface,$surface');

        if(!empty($surface)){
            $qb->andWhere('r.surface > :surface')->setParameter('surface',$surface);
        }
        if(!empty($price)){
            $qb->andWhere('r.price < :price')->setParameter('price',$price);
        }
        if(!empty($rooms)){
            $qb->andWhere('r.rooms = :rooms')->setParameter('rooms',$rooms);
        }

        return $qb->getQuery()->getResult();

    }
// chercher les bien dans la base de donnée
    public function search($query){
        $qb = $this->createQueryBuilder('r')
            ->where('r.title Like :query')
            ->setParameter('query','%'.$query.'%');

        return $qb->getQuery()->getResult();

    }

    // cherche aliatoirement 3 produit au hasard pour le caroussel
    public function les3produitsCarossel(){
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            "SELECT q  FROM App\Entity\RealEstate q order by rand() LIMIT 3 ");
        $result= $query->execute();


        return  $this->createQueryBuilder('q')
            ->Select('RAND() ')

            ->setMaxResults(2)
            ->getQuery()
            ->getResult();

    }
    public function findAllWiththeTypeDuBien($title,$surface,$price,$rooms)
    {
        // Select * From real_estate WHERE surface >50
        $qb = $this->createQueryBuilder('r')
        // ->where('r.surface > :surface')
        //->andWhere('r.price <:price')
        ->andWhere('r.title =:title')
        ->setParameter('title',$title);
        // ->setParameters('surface,$surface');

        if(!empty($surface)){
            $qb->andWhere('r.surface > :surface')->setParameter('surface',$surface);
        }
        if(!empty($price)){
            $qb->andWhere('r.price < :price')->setParameter('price',$price);
        }
        if(!empty($rooms)){
            $qb->andWhere('r.rooms = :rooms')->setParameter('rooms',$rooms);
        }

        return $qb->getQuery()->getResult();

    }



    public function searchPageHome($city,$surface,$budget,$type){


        $qb = $this->createQueryBuilder('r')
            // ->where('r.surface > :surface')
            //->andWhere('r.price <:price')
            ->andWhere('r.city =:city')
            ->setParameter('city',$city);
        // ->setParameters('surface,$surface');

        if(!empty($surface)){
            $qb->andWhere('r.surface > :surface')->setParameter('surface',$surface);
        }
        if(!empty($price)){
            $qb->andWhere('r.price < :budget')->setParameter('price',$budget);
        }
        if(!empty($type)){
            $qb->andWhere('r.type = :type')->setParameter('type',$type);
        }

        return $qb->getQuery()->getResult();

    }

    // /**
    //  * @return RealEstate[] Returns an array of RealEstate objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RealEstate
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

}
