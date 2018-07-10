<?php

namespace App\Repository;

use App\Entity\Partner;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Partner|null find($id, $lockMode = null, $lockVersion = null)
 * @method Partner|null findOneBy(array $criteria, array $orderBy = null)
 * @method Partner[]    findAll()
 * @method Partner[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartnerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Partner::class);
    }

    /**
     * @param array $filters
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getDataProvider(array $filters = [])
    {
        $queryBuilder = $this->createQueryBuilder('p')
            ->addOrderBy('p.name', 'ASC')
            ->addOrderBy('p.created_at', 'DESC');
        if (!empty($filters['name'])) {
            $queryBuilder->where('p.name LIKE :name')
                ->setParameter(':name', "%{$filters['name']}%");
        }

        if (!empty($filters['type'])) {
            $queryBuilder->where('p.type = :type')
                ->setParameter(':type', "{$filters['type']}");
        }

        return $queryBuilder;
    }
}
