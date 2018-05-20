<?php

namespace AppBundle\Controller\Grade;


use AppBundle\Entity\Grade;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListingController extends Controller
{
    public function listGradeAction()
    {
        $grades = $this->getDoctrine()->getRepository(Grade::class)->findAll();

        return $this->render('@Page/Grade/Listing/list.html.twig', array(
                'grades' => $grades,
            )
        );
    }
}
