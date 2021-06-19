<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function GetUsers($id)
    {
        $db = $this->createQueryBuilder('u')
            ->select('u.id','u.FName','u.IName','u.OName','u.ChangeFIO','u.Number','u.Series','u.RegisterNumber','u.DateGive','u.DateCommissions','u.CollorDiplom','u.NumberProtocol','u.DateProtocol','u.NumberBook','u.NumberApp','u.NameSpecialization','u.ViewLearning','u.TypeDiplom','u.NameFaculty','ur.NameRector','ur.NameDeputyRector','ur.NameChairman')
            ->where('u.group = :id')
            ->setParameter('id', $id)
            ->leftJoin('u.group','ug')
            ->leftJoin('u.responsiblePersons','ur')
            ->orderBy('u.FName', 'ASC')
            ->groupBy('u.id')
        ;
        $query = $db->getQuery();
        return $query->execute();
    }

    public function GetPrint($id)
    {
        $db = $this->createQueryBuilder('u')
            ->select('u.id','u.FName','u.IName','u.OName','u.ChangeFIO','u.Number','u.Series','u.RegisterNumber','u.DateGive','u.DateCommissions','u.CollorDiplom','u.NumberProtocol','u.DateProtocol','u.NumberBook','u.NumberApp','u.NameSpecialization','u.ViewLearning','u.TypeDiplom','u.NameFaculty','ur.NameRector','ur.NameDeputyRector','ur.NameChairman')
            ->where('u.id = :id')
            ->setParameter('id', $id)
            ->leftJoin('u.group','ug')
            ->leftJoin('u.responsiblePersons','ur')
            ->orderBy('u.FName', 'ASC')
            ->groupBy('u.id')
        ;
        $query = $db->getQuery();
        return $query->execute();
    }
}
