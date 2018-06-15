<?php

namespace AppBundle\DataFixtures\ORM\Courses;


use AppBundle\Entity\Course;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class DataBScFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $grade = $this->getReference('grade b.sc');

        $course = new Course();
        $course
            ->setTitle('3AIT')
            ->setDescription('Artificial Intelligence - Programmation Fonctionnelle')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('3AND')
            ->setDescription('Android Application Development')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('3APL')
            ->setDescription('Swift and Cocoa development')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('3ASP')
            ->setDescription('Building Web Applications with ASP.NET MVC')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('3CNS')
            ->setDescription('CCNA Security 1.2')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('3ENG')
            ->setDescription('English Language')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('3IPS')
            ->setDescription('Inter-Personal Skills')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('3JVA')
            ->setDescription('Enterprise Application Development')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('3LAW')
            ->setDescription('IT Law 3 - Labo Law and New Technologies')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('3LIN')
            ->setDescription('Linux Technologies - Datacenter Solutions')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('3MET')
            ->setDescription('ITIL Foundations')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('3MGT')
            ->setDescription('IT Management 3 - Economics and IT Business Strategy')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('3MSA')
            ->setDescription('Microsoft Windows - Active Directory')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('3ORC')
            ->setDescription('Oracle Technologies - DBA 10g')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('3WEB')
            ->setDescription('Web technologies and mobility')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('3WIN')
            ->setDescription('Universal Windows App Development')
            ->setGrade($grade);

        $manager->persist($course);

        $manager->flush();
    }

    public function getOrder()
    {
        return 10;
    }
}
