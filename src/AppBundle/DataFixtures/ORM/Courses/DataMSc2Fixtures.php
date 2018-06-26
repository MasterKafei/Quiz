<?php

namespace AppBundle\DataFixtures\ORM\Courses;


use AppBundle\Entity\Course;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class DataMSc2Fixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $grade = $this->getReference('grade m.sc2');

        $course = new Course();
        $course
            ->setTitle('5BCP')
            ->setDescription('Disaster Recovery Planning - Ensuring Business Continuity')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('5BIS')
            ->setDescription('Business Intelligence Solutions')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('5CLD')
            ->setDescription('Microsoft Azure Infrastructure Services')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('5DAT')
            ->setDescription('Introduction to Big Data')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('5EBP')
            ->setDescription('Engineer Best Practices')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('5EMI')
            ->setDescription('Emotional Intelligence - Archieving Leadership Success')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('5ENG')
            ->setDescription('English Language')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('5EPS')
            ->setDescription('Création d\'entreprises')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('5LAW')
            ->setDescription('IT LAW 5 - IT Contract Law')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('5MET')
            ->setDescription('CobiT')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('5MGT')
            ->setDescription('IT performance')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('5ORC')
            ->setDescription('Oracle Datawarehouse')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('5TGF')
            ->setDescription('Preparing for TOGAF Accreditation')
            ->setValidate(true)
            ->setGrade($grade);

        $manager->persist($course);

        $course = new Course();
        $course
            ->setTitle('5VTZ')
            ->setDescription('Application Virtualization')
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
