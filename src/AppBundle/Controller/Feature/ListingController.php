<?php

namespace AppBundle\Controller\Feature;

use AppBundle\Entity\Feature;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListingController extends Controller
{
    public function listFeatureAction()
    {
        $features = $this->getDoctrine()->getRepository(Feature::class)->findAll();

        return $this->render('@Page/Feature/Listing/list.html.twig', array(
            'features' => $features,
        ));
    }
}
