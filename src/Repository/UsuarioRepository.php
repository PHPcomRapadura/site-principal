<?php

namespace App\Repository;

use App\Entity\Usuario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;

class UsuarioRepository extends ServiceEntityRepository implements UserLoaderInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Usuario::class);
    }

    public function loadUserByUsername($username)
    {
        return $this->createQueryBuilder("u")
            ->where("u.email = :email")
            ->setParameter("email", $username)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
