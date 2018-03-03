<?php

namespace AppBundle\Controller\Quiz;


use AppBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListingController extends Controller
{

    public function newAction()
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();

        return $this->render('@Page/Quiz/Listing/list.html.twig', array(
            'categories' => $categories,
        ));
    }
}
