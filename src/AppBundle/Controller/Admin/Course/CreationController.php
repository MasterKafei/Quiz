<?php

namespace AppBundle\Controller\Admin\Course;

use AppBundle\Entity\Course;
use AppBundle\Form\Type\Course\CourseCreationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CreationController extends Controller
{
    public function createAction(Request $request)
    {
        $course = new Course();
        $form = $this->createForm(CourseCreationType::class, $course);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($course);
            $em->flush();

            return $this->redirectToRoute('app_admin_course_listing_list');
        }

        return $this->render('@Page/Admin/Course/Creation/create.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}