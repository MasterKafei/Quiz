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

        $this->setReference('category 3met', $category);
        $manager->persist($category);

        $category = new Category();

        $category
            ->setTitle('3MGT')
            ->setDescription('IT Management 3 - Economics and IT Business Strategy');

        $this->setReference('category 3mgt', $category);
        $manager->persist($category);
        $category = new Category();

        $category
            ->setTitle('3AIT')
            ->setDescription('Artificial Intelligence - Programmation Fonctionnelle');

        $this->setReference('category 3ait', $category);
        $manager->persist($category);

        $category = new Category();

        $manager->flush();
    }


    public function getOrder()
    {
        return 100;
    }

}
