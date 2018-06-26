<?php

namespace AppBundle\Controller\Course;


use AppBundle\Entity\Contribution;
use AppBundle\Entity\Course;
use AppBundle\Form\Type\Course\CourseCreationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CreationController extends Controller
{
    public function createCourseAction(Request $request)
    {
        $course = new Course();
        $form = $this->createForm(CourseCreationType::class, $course);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contribution = new Contribution();
            $contribution->setUser($this->getUser());
            $contribution->setItemContribution($course);

            $em = $this->getDoctrine()->getManager();
            $em->persist($contribution);
            $em->flush();

            return $this->redirectToRoute('app_contribution_listing_list');
        }

        return $this->render('@Page/Course/Creation/create.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
