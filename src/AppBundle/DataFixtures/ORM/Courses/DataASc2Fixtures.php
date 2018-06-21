<?php

namespace AppBundle\DataFixtures\ORM\Courses;


use AppBundle\Entity\Course;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class DataASc2Fixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $grade = $this->getReference('grade a.sc2');

        $course = new Course();
        $course
            ->setTitle('2ADS')
            ->setDescription('Advanced Algorithms')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2CLD')
            ->setDescription('Cloud Computing')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2CMP')
            ->setDescription('Compilation')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2CNB')
            ->setDescription('Cisco CCNA Routing & Switching - Part 2')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2CPP')
            ->setDescription('C++ Language')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2ENG')
            ->setDescription('English Language')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2GRA')
            ->setDescription('Graph Theory')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2IPS')
            ->setDescription('Inter-Personal Skills')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2JVA')
            ->setDescription('Java Standard Edition')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2JWB')
            ->setDescription('Web Strategy - Level 2')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2LAW')
            ->setDescription('IT Law 2 - Electronic Communications - Network Administration and Fraud')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2LIN')
            ->setDescription('Linux Technologies - Edge Computing')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2MGT')
            ->setDescription('Modeling for business analysis')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2MSA')
            ->setDescription('Microsoft Windows - Administration and Network infrastructure')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2NET')
            ->setDescription('Microsoft .NET Foundations and Enterprise Applications')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2OOP')
            ->setDescription('Object Oriented Programming in Python')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2ORC')
            ->setDescription('PL-SQL Fundamentals')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2PBS')
            ->setDescription('Probabilities and Statistics')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2UML')
            ->setDescription('Unified Modeling Language')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2WEB')
            ->setDescription('Web Programming with PHP')
            ->setGrade($grade);

        $manager->persist($course);

        $manager->flush();
    }

    public function getOrder()
    {
        return 10;
    }
}
