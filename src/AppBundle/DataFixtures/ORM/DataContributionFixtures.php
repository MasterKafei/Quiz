<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Contribution;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class DataContributionFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $contribution = new Contribution();
        $manager->persist($contribution);
        $manager->flush();
    }


    public function getOrder()
    {
        return 100;
    }

}
