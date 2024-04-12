<?php

namespace App\Repository;

use App\Entity\Newz;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Newz>
 *
 * @method Newz|null find($id, $lockMode = null, $lockVersion = null)
 * @method Newz|null findOneBy(array $criteria, array $orderBy = null)
 * @method Newz[]    findAll()
 * @method Newz[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewzRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Newz::class);
    }
    public function findBySearchQuery($q)
    {
    $queryBuilder = $this->createQueryBuilder('n');

    if ($q) {
        $queryBuilder
            ->where('n.titre LIKE :q OR n.contenu LIKE :q')
            ->setParameter('q', '%'.$q.'%');
    }

    return $queryBuilder
        ->getQuery()
        ->getResult();
    }

    //    /**
    //     * @return Newz[] Returns an array of Newz objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('n')
    //            ->andWhere('n.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('n.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Newz
    //    {
    //        return $this->createQueryBuilder('n')
    //            ->andWhere('n.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}