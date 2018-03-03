<?php

namespace AppBundle\Controller\Admin\UserGroup;

use AppBundle\Entity\UserGroup;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListingController extends Controller
{
    public function listAction()
    {
        $groups = $this->getDoctrine()->getRepository(UserGroup::class)->findAll();

        return $this->render('@Page/Admin/UserGroup/Listing/list.html.twig', array(
            'groups' => $groups,
        ));
    }
}
