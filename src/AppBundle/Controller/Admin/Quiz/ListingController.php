<?php

namespace AppBundle\Controller\Admin\Quiz;

use AppBundle\Entity\Quiz;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListingController extends Controller
{
    public function listAction()
    {
        $quizzes = $this->getDoctrine()->getRepository(Quiz::class)->findAll();

        return $this->render('@Page/Admin/Quiz/Listing/list.html.twig', array('quizzes' => $quizzes));
    }
}