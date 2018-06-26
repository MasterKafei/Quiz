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
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4BIS')
            ->setDescription('Business Intelligence Fundamentals')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4CLD')
            ->setDescription('Cloud computing Technologies Introduction')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4ENG')
            ->setDescription('English Language')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4EPS')
            ->setDescription('IT Entrepreneurship')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4ERP')
            ->setDescription('ERP Solutions')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4IPS')
            ->setDescription('Inter-Personal Skills')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4JVA')
            ->setDescription('Java EE - Enterprise Programming')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4LAW')
            ->setDescription('IT Law - Personal Data Protection')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4MET')
            ->setDescription('Agile Project Management with Scrum')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4MGT')
            ->setDescription('Finance & IT')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4MOS')
            ->setDescription('Microsoft Sharepoint Administration')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4MSE')
            ->setDescription('Microsoft Exchange')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4NET')
            ->setDescription('.NET 4.5 Programming for Existing .NET Developers')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4OPR')
            ->setDescription('Microsoft On Premises')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4VIP')
            ->setDescription('VoIP')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('4VTZ')
            ->setDescription('Virtulization and IS Urbanization')
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
