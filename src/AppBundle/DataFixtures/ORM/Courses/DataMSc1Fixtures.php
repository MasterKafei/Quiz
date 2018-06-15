<?php

namespace AppBundle\DataFixtures\ORM\Courses;


use AppBundle\Entity\Course;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class DataMSc1Fixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $grade = $this->getReference('grade m.sc1');

        $course = new Course();
        $course
            ->setTitle('4AIT')
            ->setDescription('Intelligence Artificielle - Programmation logique')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4BIS - Business Intelligence Fundamentals')
            ->setDescription('')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4CLD')
            ->setDescription('Cloud computing Technologies Introduction')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4ENG')
            ->setDescription('English Language')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4EPS')
            ->setDescription('IT Entrepreneurship')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4ERP')
            ->setDescription('ERP Solutions')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4IPS')
            ->setDescription('Inter-Personal Skills')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4JVA')
            ->setDescription('Java EE - Enterprise Programming')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4LAW')
            ->setDescription('IT Law - Personal Data Protection')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4MET')
            ->setDescription('Agile Project Management with Scrum')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4MGT')
            ->setDescription('Finance & IT')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4MOS')
            ->setDescription('Microsoft Sharepoint Administration')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4MSE')
            ->setDescription('Microsoft Exchange')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4NET')
            ->setDescription('.NET 4.5 Programming for Existing .NET Developers')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4OPR')
            ->setDescription('Microsoft On Premises')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4VIP')
            ->setDescription('VoIP')
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4VTZ')
            ->setDescription('Virtulization and IS Urbanization')
            ->setGrade($grade);

        $manager->persist($course);

        $manager->flush();
    }

    public function getOrder()
    {
        return 10;
    }
}
