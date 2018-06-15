<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Grade;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class DataGradeFixtures extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @param ContainerInterface|null $container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $directory = $this->container->getParameter('vich_upload_images_folder');

        $name = FixturesTools::saveFileFromLink('https://craaftx.github.io/doctrina/public/image/monastery.jpg', 'jpg', $directory);

        $grade = new Grade();
        $grade
            ->setName('A.Sc 1')
            ->setImagePath($name);

        $this->addReference('grade a.sc1', $grade);
        $manager->persist($grade);

        $name = FixturesTools::saveFileFromLink('https://craaftx.github.io/doctrina/public/image/busan-night-scene.jpg', 'jpg', $directory);

        $grade = new Grade();
        $grade
            ->setName('A.Sc 2')
            ->setImagePath($name);

        $this->addReference('grade a.sc2', $grade);
        $manager->persist($grade);

        $name = FixturesTools::saveFileFromLink('https://craaftx.github.io/doctrina/public/image/clock.jpg', 'jpg', $directory);

        $grade = new Grade();
        $grade
            ->setName('B.Sc')
            ->setImagePath($name);

        $this->addReference('grade b.sc', $grade);
        $manager->persist($grade);

        $name = FixturesTools::saveFileFromLink('https://craaftx.github.io/doctrina/public/image/nature.jpg', 'jpg', $directory);

        $grade = new Grade();
        $grade
            ->setName('M.Sc 1')
            ->setImagePath($name);

        $this->addReference('grade m.sc1', $grade);
        $manager->persist($grade);

        $name = FixturesTools::saveFileFromLink('https://craaftx.github.io/doctrina/public/image/sky.jpg', 'jpg', $directory);

        $grade = new Grade();
        $grade
            ->setName('M.Sc 2')
            ->setImagePath($name);

        $this->addReference('grade m.sc2', $grade);
        $manager->persist($grade);

        $manager->flush();
    }

    public function getOrder()
    {
        return 0;
    }
}
