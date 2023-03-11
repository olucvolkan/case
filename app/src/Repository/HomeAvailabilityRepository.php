<?php

namespace App\Repository;

use App\DTO\Request\SearchRequestSchema;
use App\Entity\HomeAvailability;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HomeAvailability>
 *
 * @method HomeAvailability|null find($id, $lockMode = null, $lockVersion = null)
 * @method HomeAvailability|null findOneBy(array $criteria, array $orderBy = null)
 * @method HomeAvailability[]    findAll()
 * @method HomeAvailability[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HomeAvailabilityRepository extends ServiceEntityRepository
{
    public const MAX_RESULT_SIZE = 5;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HomeAvailability::class);
    }

    public function save(HomeAvailability $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(HomeAvailability $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return HomeAvailability[] Returns an array of HomeAvailability objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('h.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

    public function searchAvailableHome(SearchRequestSchema $searchRequestSchema)
    {

        $qb = $this->createQueryBuilder('hA');
        return $qb
            ->join('hA.home', 'h')
            ->where('hA.fromDate <= :checkInDate')
            ->andWhere('hA.toDate >= :checkOutDate')
            ->setParameter('checkOutDate', (new DateTime($searchRequestSchema->checkOutDate))->format('Y-m-d'))
            ->setParameter('checkInDate', (new DateTime($searchRequestSchema->checkInDate))->format('Y-m-d'))
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(self::MAX_RESULT_SIZE)
            ->getQuery()
            ->getResult();
    }
}
