<?php

namespace App\Repository;

use App\Entity\MentorHasMembers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MentorHasMembers>
 *
 * @method MentorHasMembers|null find($id, $lockMode = null, $lockVersion = null)
 * @method MentorHasMembers|null findOneBy(array $criteria, array $orderBy = null)
 * @method MentorHasMembers[]    findAll()
 * @method MentorHasMembers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MentorHasMembersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MentorHasMembers::class);
    }

//    /**
//     * @return MentorHasMembers[] Returns an array of MentorHasMembers objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MentorHasMembers
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
