<?php

namespace App\Repository;

use App\Entity\Groups;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Groups|null find($id, $lockMode = null, $lockVersion = null)
 * @method Groups|null findOneBy(array $criteria, array $orderBy = null)
 * @method Groups[]    findAll()
 * @method Groups[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GroupsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Groups::class);
    }

   public function GetGroups()
   {
       $db = $this->createQueryBuilder('g')
           ->select('g.id','g.name', 'COUNT(gu.id) as countS')
           ->leftJoin('g.groupId','gu')
           ->orderBy('g.name', 'ASC')
           ->groupBy('g.id')
       ;
       $query = $db->getQuery();
       return $query->execute();
   }
}
