<?php

namespace App\Repository;

use App\Entity\UsersRole;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UsersRole>
 *
 * @method UsersRole|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsersRole|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsersRole[]    findAll()
 * @method UsersRole[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersRoleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsersRole::class);
    }

//    /**
//     * @return UsersRole[] Returns an array of UsersRole objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UsersRole
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
