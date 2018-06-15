<?php

use AppBundle\Entity\Chapter;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

/**
 * Created by PhpStorm.
 * User: User
 * Date: 15/06/2018
 * Time: 20:52
 */

class DataChapterFixtures extends AbstractFixture implements OrderedFixtureInterface
{


    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(\Doctrine\Common\Persistence\ObjectManager $manager)
    {
        $chapter = new Chapter();

        /*
        $chapter
            ->setTitle('Premier pas')
            ->setCourse( $this->getReference )
            ->setText('Je suis un résumé du cours de 1ADS du chapitre Premier pas');*/
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 200;
    }
}