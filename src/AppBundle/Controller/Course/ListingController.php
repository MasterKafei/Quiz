<?php

namespace AppBundle\Controller\Course;


use AppBundle\Entity\Course;
use AppBundle\Entity\ItemContribution;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListingController extends Controller
{
    public function listUserCourseAction()
    {
        $contributions = $this->getDoctrine()->getRepository(ItemContribution::class)->findUserItemContributions($this->getUser(), Course::class);

        return $this->render('@Page/Course/Listing/user.html.twig',
            array(
                'contributions' => $contributions,
            ));
    }
}
