<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Feature;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class DataFeatureFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $feature = new Feature();
        $feature
            ->setTitle('Share all types of data')
            ->setDescription('Post hoc impie perpetratum quod in aliis quoque iam timebatur, tamquam licentia crudelitati indulta per suspicionum nebulas')
            ->setIcon('far fa-folder-open');

        $manager->persist($feature);

        $feature = new Feature();
        $feature
            ->setTitle('Accessible from anywhere')
            ->setDescription('Post hoc impie perpetratum quod in aliis quoque iam timebatur, tamquam licentia crudelitati indulta per suspicionum nebulas')
            ->setIcon('fas fa-globe');

        $manager->persist($feature);

        $feature = new Feature();
        $feature
            ->setTitle('Share easily with someone')
            ->setDescription('Post hoc impie perpetratum quod in aliis quoque iam timebatur, tamquam licentia crudelitati indulta per suspicionum nebulas')
            ->setIcon('far fa-handshake');

        $manager->persist($feature);

        $feature = new Feature();
        $feature
            ->setTitle('User Friendly Interface')
            ->setDescription('Post hoc impie perpetratum quod in aliis quoque iam timebatur, tamquam licentia crudelitati indulta per suspicionum nebulas')
            ->setIcon('fas fa-desktop');

        $manager->persist($feature);

        $feature = new Feature();
        $feature
            ->setTitle('User statistics')
            ->setDescription('Post hoc impie perpetratum quod in aliis quoque iam timebatur, tamquam licentia crudelitati indulta per suspicionum nebulas')
            ->setIcon('far fa-play-circle');

        $manager->persist($feature);

        $feature = new Feature();
        $feature
            ->setTitle('Long time support')
            ->setDescription('Post hoc impie perpetratum quod in aliis quoque iam timebatur, tamquam licentia crudelitati indulta per suspicionum nebulas')
            ->setIcon('far fa-calendar-alt');

        $manager->persist($feature);
        $manager->flush();
    }

    public function getOrder()
    {
        return 0;
    }
}
