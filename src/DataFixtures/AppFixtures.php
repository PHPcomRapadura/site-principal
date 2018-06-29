<?php

namespace App\DataFixtures;

use App\Entity\Usuario;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new Usuario();
        $user->setNome("Administrador");
        $user->setEmail("admin@phpcomrapadura.com.br");
        $user->setSenha('rapaduradopoder');
        $user->setGrupo("ROLE_ADMIN");
        $user->setStatus(1);
        $user->setCriadoEm(new \DateTime());
        $user->setCriadoPor(1);

        $manager->persist($user);
        $manager->flush();
    }
}