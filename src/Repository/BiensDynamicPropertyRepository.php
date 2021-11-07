<?php

namespace App\Repository;

use App\Entity\BiensDynamicProperty;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BiensDynamicProperty|null find($id, $lockMode = null, $lockVersion = null)
 * @method BiensDynamicProperty|null findOneBy(array $criteria, array $orderBy = null)
 * @method BiensDynamicProperty[]    findAll()
 * @method BiensDynamicProperty[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BiensDynamicPropertyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BiensDynamicProperty::class);
    }

    // /**
    //  * @return BiensDynamicProperty[] Returns an array of BiensDynamicProperty objects
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
    public function findOneBySomeField($value): ?BiensDynamicProperty
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
