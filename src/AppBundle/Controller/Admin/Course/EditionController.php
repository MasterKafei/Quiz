<?php


namespace AppBundle\Controller\Admin\Course;


use AppBundle\Entity\Course;
use AppBundle\Form\Type\Course\CourseCreationType;
use AppBundle\Form\Type\Course\CourseEditionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EditionController extends Controller
{
    public function editAction(Request $request, Course $course)
    {
        $form = $this->createForm(CourseCreationType::class, $course);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($course);
            $em->flush();

            return $this->redirectToRoute('app_admin_course_listing_list');
        }

        return $this->render('@Page/Admin/Course/Edition/edit.html.twig', array(
            'form' => $form->createView(),
            'course' => $course,
        ));
    }

    public function groupAction(Request $request, Course $course)
    {
        $form = $this->createForm(CourseEditionType::class, $course);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($course);
            $em->flush();

            return $this->redirectToRoute('app_admin_course_showing_show', array('id' => $course->getId()));
        }

        return $this->render('@Page/Admin/Course/Edition/group.html.twig', array(
            'form' => $form->createView(),
            'course' => $course,
        ));
    }
}