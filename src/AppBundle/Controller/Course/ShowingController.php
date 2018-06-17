<?php

namespace AppBundle\Controller\Course;


use AppBundle\Entity\Course;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShowingController extends Controller
{
    public function showCourseAction(Course $course)
    {
        return $this->render('@Page/Course/Showing/show.html.twig', array(
            'course' => $course,
        ));
    }
}
