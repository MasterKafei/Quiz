<?php

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Category;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class DataCategoryFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $category = new Category();

        $category
            ->setTitle('3MET')
            ->setDescription('ITIL Foundations');

        $manager->persist($category);
        $manager->flush();

        $category = new Category();

        $category
            ->setTitle('3MGT')
            ->setDescription('IT Management 3 - Economics and IT Business Strategy');

        $manager->persist($category);
        $manager->flush();

        $category = new Category();

        $category
            ->setTitle('3AIT')
            ->setDescription('Artificial Intelligence - Programmation Fonctionnelle');

        $manager->persist($category);
        $manager->flush();
    }


    public function getOrder()
    {
        return 100;
    }

}
