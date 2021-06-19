<?php

namespace App\Repository;

use App\Entity\ResponsiblePersons;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ResponsiblePersons|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResponsiblePersons|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResponsiblePersons[]    findAll()
 * @method ResponsiblePersons[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResponsiblePersonsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResponsiblePersons::class);
    }

    // /**
    //  * @return ResponsiblePersons[] Returns an array of ResponsiblePersons objects
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
    public function findOneBySomeField($value): ?ResponsiblePersons
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
