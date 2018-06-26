<?php

namespace AppBundle\Controller\Contribution;


use AppBundle\Entity\Contribution;
use AppBundle\Entity\ItemContribution;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListingController extends Controller
{
    public function listContributionAction()
    {
        $contributions = $this->getDoctrine()->getRepository(ItemContribution::class)->findUserItemContributions($this->getUser());

        return $this->render('@Page/Contribution/Listing/list.html.twig',
            array(
                'contributions' => $contributions,
            ));
    }
}
