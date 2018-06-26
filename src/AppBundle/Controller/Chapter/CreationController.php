<?php

namespace AppBundle\Controller\Chapter;


use AppBundle\Entity\Chapter;
use AppBundle\Entity\Contribution;
use AppBundle\Entity\Course;
use AppBundle\Entity\Grade;
use AppBundle\Form\Type\Chapter\ChapterCreationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CreationController extends Controller
{
    public function createChapterAction(Request $request, Course $course)
    {
        $chapter = new Chapter();
        $chapter->setCourse($course);
        $form = $this->createForm(ChapterCreationType::class, $chapter);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contribution = new Contribution();
            $contribution->setUser($this->getUser());
            $contribution->setItemContribution($chapter);
            $em = $this->getDoctrine()->getManager();
            $em->persist($contribution);
            $em->flush();

            $this->redirectToRoute('app_contribution_listing_list');
        }

        return $this->render('@Page/Chapter/Creation/create.html.twig',
            array(
                'form' => $form->createView(),
            ));
    }

    public function chooseGradeAction()
    {
        $grades = $this->getDoctrine()->getRepository(Grade::class)->findAll();

        return $this->render('@Page/Chapter/Creation/choose_grade.html.twig',
            array(
                'grades' => $grades,
            )
        );
    }

    public function chooseCourseAction(Grade $grade)
    {
        return $this->render('@Page/Chapter/Creation/choose_course.html.twig', array(
            'courses' => $grade->getCourses(),
        ));
    }
}
