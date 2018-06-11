<?php

namespace AppBundle\Controller\Contributor;


use AppBundle\Entity\Contributor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListingController extends Controller
{
    public function listContributorAction()
    {
        $contributors = $this->getDoctrine()->getManager()->getRepository(Contributor::class)->findAll();

        return $this->render('@Page/Contributor/Listing/list.html.twig', array(
            'contributors' => $contributors,
        ));
    }
}
