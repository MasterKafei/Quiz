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
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1ARI')
            ->setDescription('Arithmetic and cryptography')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1CNA')
            ->setDescription('Cisco CCNA Routing & Switching - Part 1')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1CPA')
            ->setDescription('Computer Architecture')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1ENG')
            ->setDescription('English Language')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1GCC')
            ->setDescription('C Language')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1IPS')
            ->setDescription('Inter-Personal Skills')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1JWB')
            ->setDescription('Web Strategy')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1LAL')
            ->setDescription('Linear Algebra')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1LAW')
            ->setDescription('IT LAW - Internet Law and Intellectual Property')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1LIN')
            ->setDescription('Linux Technologies - System Fundamentals')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1MER')
            ->setDescription('Merise Modeling')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1MGT')
            ->setDescription('IT Management 1 - Fundamentals')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1MSA')
            ->setDescription('Windows Server 2012 Introduction')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1ORC')
            ->setDescription('SQL Fundamentals')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1OSS')
            ->setDescription('Operating Systems')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1SEC')
            ->setDescription('Information System Security')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1SET')
            ->setDescription('Set theory')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('1WEB')
            ->setDescription('HTML and Javascript - User Interface')
            ->setGrade($grade);

        $manager->persist($course);

        $manager->flush();
    }

    public function getOrder()
    {
        return 10;
    }
}
