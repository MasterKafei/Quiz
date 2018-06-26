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
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2CLD')
            ->setDescription('Cloud Computing')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2CMP')
            ->setDescription('Compilation')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2CNB')
            ->setDescription('Cisco CCNA Routing & Switching - Part 2')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2CPP')
            ->setDescription('C++ Language')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2ENG')
            ->setDescription('English Language')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2GRA')
            ->setDescription('Graph Theory')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2IPS')
            ->setDescription('Inter-Personal Skills')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2JVA')
            ->setDescription('Java Standard Edition')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2JWB')
            ->setDescription('Web Strategy - Level 2')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2LAW')
            ->setDescription('IT Law 2 - Electronic Communications - Network Administration and Fraud')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2LIN')
            ->setDescription('Linux Technologies - Edge Computing')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2MGT')
            ->setDescription('Modeling for business analysis')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2MSA')
            ->setDescription('Microsoft Windows - Administration and Network infrastructure')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2NET')
            ->setDescription('Microsoft .NET Foundations and Enterprise Applications')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2OOP')
            ->setDescription('Object Oriented Programming in Python')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2ORC')
            ->setDescription('PL-SQL Fundamentals')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2PBS')
            ->setDescription('Probabilities and Statistics')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2UML')
            ->setDescription('Unified Modeling Language')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('2WEB')
            ->setDescription('Web Programming with PHP')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $manager->flush();
    }

    public function getOrder()
    {
        return 10;
    }
}
