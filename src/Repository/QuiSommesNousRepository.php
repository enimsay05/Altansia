<?php

namespace App\Repository;

use App\Entity\QuiSommesNous;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<QuiSommesNous>
 *
 * @method QuiSommesNous|null find($id, $lockMode = null, $lockVersion = null)
 * @method QuiSommesNous|null findOneBy(array $criteria, array $orderBy = null)
 * @method QuiSommesNous[]    findAll()
 * @method QuiSommesNous[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QuiSommesNousRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, QuiSommesNous::class);
    }

    public function save(QuiSommesNous $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(QuiSommesNous $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return QuiSommesNous[] Returns an array of QuiSommesNous objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('q')
//            ->andWhere('q.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('q.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?QuiSommesNous
//    {
//        return $this->createQueryBuilder('q')
//            ->andWhere('q.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
