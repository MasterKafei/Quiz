<?php

namespace AppBundle\Controller\Chapter;

use AppBundle\Entity\Chapter;
use AppBundle\Entity\ItemContribution;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListingController extends Controller
{
    public function listUserChapterAction()
    {
        $contributions = $this->getDoctrine()->getRepository(ItemContribution::class)->findUserItemContributions($this->getUser(), Chapter::class);

        return $this->render('@Page/Chapter/Listing/user.html.twig', array(
            'contributions' => $contributions,
        ));
    }
}
