<?php

namespace AppBundle\Controller\Admin\Chapter;

use AppBundle\Entity\Chapter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListingController extends Controller
{
    public function listAction()
    {
        $chapters = $this->getDoctrine()->getRepository(Chapter::class)->findAll();

        return $this->render('@Page/Admin/Chapter/Listing/list.html.twig', array(
            'chapters' => $chapters,
        ));
    }
}