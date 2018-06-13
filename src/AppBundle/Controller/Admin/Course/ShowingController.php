<?php


namespace AppBundle\Controller\Admin\Course;


use AppBundle\Entity\Course;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShowingController extends Controller
{
    public function showAction(Course $course)
    {
        return $this->render('@Page/Admin/Course/Showing/show.html.twig', array(
            'course' => $course,
        ));
    }
}