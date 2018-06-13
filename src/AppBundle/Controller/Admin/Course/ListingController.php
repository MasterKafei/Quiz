<?php

namespace AppBundle\Controller\Admin\Course;


use AppBundle\Entity\Course;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListingController extends Controller
{
    public function listAction()
    {
        $courses = $this->getDoctrine()->getRepository(Course::class)->findAll();

        return $this->render('@Page/Admin/Course/Listing/list.html.twig', array(
            'courses' => $courses,
        ));
    }
}