<?php

namespace App\Repository;

use App\Entity\UsersForm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UsersForm>
 *
 * @method UsersForm|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsersForm|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsersForm[]    findAll()
 * @method UsersForm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersFormRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsersForm::class);
    }

//    /**
//     * @return UsersForm[] Returns an array of UsersForm objects
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

//    public function findOneBySomeField($value): ?UsersForm
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
