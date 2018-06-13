<?php

namespace AppBundle\Controller\Admin\Category;

use AppBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListingController extends Controller
{
    public function listAction()
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();

        return $this->render('@Page/Admin/Category/Listing/list.html.twig', array(
            'categories' => $categories,
        ));
    }
}