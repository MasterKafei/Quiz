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
        $category
            ->setTitle('3MSA')
            ->setDescription('3MSA - Windows Server Active Directory Domain Services');

        $this->setReference('category 3msa', $category);
        $manager->persist($category);


        $category = new Category();
        $category
            ->setTitle('3WEB')
            ->setDescription('3WEB - Advanced Web Programming');

        $this->setReference('category 3web', $category);
        $manager->persist($category);

        $category = new Category();
        $category
            ->setTitle('3APL')
            ->setDescription('3APL - Swift and Cocoa development');

        $this->setReference('category 3apl', $category);
        $manager->persist($category);

        $category = new Category();
        $category
            ->setTitle('3ASP')
            ->setDescription('3ASP - ASP.NET development');

        $this->setReference('category 3asp', $category);
        $manager->persist($category);

        $category = new Category();
        $category
            ->setTitle('3JVA')
            ->setDescription('3JVA - Enterprise Application Development');

        $this->setReference('category 3jva', $category);
        $manager->persist($category);

        $category = new Category();
        $category
            ->setTitle('3ORC')
            ->setDescription('3ORC - Oracle Database Administration');

        $this->setReference('category 3orc', $category);
        $manager->persist($category);

        $manager->flush();
    }


    public function getOrder()
    {
        return 100;
    }

}
