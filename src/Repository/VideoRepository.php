<?php

namespace App\Repository;

use App\Entity\Video;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Video|null find($id, $lockMode = null, $lockVersion = null)
 * @method Video|null findOneBy(array $criteria, array $orderBy = null)
 * @method Video[]    findAll()
 * @method Video[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Video::class);
    }

    /**
     * @param array $filters
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getDataProvider(array $filters = [])
    {
        $queryBuilder = $this->createQueryBuilder('v')
            ->addOrderBy('v.title', 'ASC')
            ->addOrderBy('v.created_at', 'DESC');

        if (!empty($filters)) {
            $queryBuilder->where('v.title LIKE :title')
                ->orWhere('v.description LIKE :title')
                ->setParameter(':title', "%{$filters['title']}%");
        }

        return $queryBuilder;
    }
}
