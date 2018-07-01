<?php

namespace App\DataFixtures;

use App\Entity\Setting;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SettingsFixtures extends Fixture
{
    /**
     * @inheritdoc
     */
    public function load(ObjectManager $manager)
    {
        $user = $manager->getRepository(User::class)->findOneBy([
            'email' => 'admin@phpcomrapadura.org'
        ]);

        $setting = new Setting;
        $setting->setCode('FACEBOOK_URL')
            ->setTitle('URL da fanpage da comunidade')
            ->setValue('https://www.facebook.com/RAPADURAdoPoder')
            ->setCreatedAt(new \DateTime("now"))
            ->setUpdatedAt(new \DateTime("now"))
            ->setUpdatedBy($user);

        $manager->persist($setting);
        $manager->flush();

        $setting = new Setting;
        $setting->setCode('TWITTER_URL')
            ->setTitle('URL da perfil do twitter da comunidade')
            ->setValue('https://twitter.com/phpcomrapadura')
            ->setCreatedAt(new \DateTime("now"))
            ->setUpdatedAt(new \DateTime("now"))
            ->setUpdatedBy($user);

        $manager->persist($setting);
        $manager->flush();

        $setting = new Setting;
        $setting->setCode('FLICKR_URL')
            ->setTitle('URL da perfil do Flickr da comunidade')
            ->setValue('https://www.flickr.com/people/phpcomrapadura')
            ->setCreatedAt(new \DateTime("now"))
            ->setUpdatedAt(new \DateTime("now"))
            ->setUpdatedBy($user);

        $manager->persist($setting);
        $manager->flush();

        $setting = new Setting;
        $setting->setCode('GITHUB_URL')
            ->setTitle('URL do Github da comunidade')
            ->setValue('https://github.com/PHPcomRapadura')
            ->setCreatedAt(new \DateTime("now"))
            ->setUpdatedAt(new \DateTime("now"))
            ->setUpdatedBy($user);

        $manager->persist($setting);
        $manager->flush();

        $setting = new Setting;
        $setting->setCode('POSTAGEM_BLOG_ATIVA')
            ->setTitle("Liberar a criação de POST's na área des membros")
            ->setValue(1)
            ->setCreatedAt(new \DateTime("now"))
            ->setUpdatedAt(new \DateTime("now"))
            ->setUpdatedBy($user);

        $manager->persist($setting);
        $manager->flush();

        $setting = new Setting;
        $setting->setCode('POSTAGEM_VAGAS_ATIVA')
            ->setTitle("Liberar a criação de ofertas de emprego na área de membros.")
            ->setValue(1)
            ->setCreatedAt(new \DateTime("now"))
            ->setUpdatedAt(new \DateTime("now"))
            ->setUpdatedBy($user);

        $manager->persist($setting);
        $manager->flush();
    }
}
