<?php

namespace AppBundle\DataFixtures\ORM\Courses;


use AppBundle\Entity\Course;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class DataASc1Fixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $grade = $this->getReference('grade a.sc1');

        $course = new Course();
        $course
            ->setTitle('1ADS')
            ->setDescription('Algorithm in Python')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1ARI')
            ->setDescription('Arithmetic and cryptography')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1CNA')
            ->setDescription('Cisco CCNA Routing & Switching - Part 1')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1CPA')
            ->setDescription('Computer Architecture')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1ENG')
            ->setDescription('English Language')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1GCC')
            ->setDescription('C Language')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1IPS')
            ->setDescription('Inter-Personal Skills')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1JWB')
            ->setDescription('Web Strategy')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1LAL')
            ->setDescription('Linear Algebra')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1LAW')
            ->setDescription('IT LAW - Internet Law and Intellectual Property')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1LIN')
            ->setDescription('Linux Technologies - System Fundamentals')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1MER')
            ->setDescription('Merise Modeling')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1MGT')
            ->setDescription('IT Management 1 - Fundamentals')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1MSA')
            ->setDescription('Windows Server 2012 Introduction')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1ORC')
            ->setDescription('SQL Fundamentals')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1OSS')
            ->setDescription('Operating Systems')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1SEC')
            ->setDescription('Information System Security')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1SET')
            ->setDescription('Set theory')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1WEB')
            ->setDescription('HTML and Javascript - User Interface')
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
