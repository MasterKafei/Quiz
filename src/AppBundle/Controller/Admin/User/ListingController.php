<?php

namespace AppBundle\Controller\Admin\User;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ListingController extends Controller
{
    public function listAction()
    {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        return $this->render('@Page/Admin/User/Listing/list.html.twig', array(
            'users' => $users,
        ));
    }
}
