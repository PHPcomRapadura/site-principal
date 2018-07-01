<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User;
        $user->setName("Administrador");
        $user->setEmail("admin@phpcomrapadura.com.br");
        $user->setPassword('rapaduradopoder');
        $user->setRoles("ROLE_ADMIN");
        $user->setStatus(true);
        $user->setCreatedAt(new \DateTime("now"));
        $user->setCreatedBy(1);

        $manager->persist($user);
        $manager->flush();
    }
}
