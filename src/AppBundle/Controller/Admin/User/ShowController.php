<?php

namespace AppBundle\Controller\Admin\User;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShowController extends Controller
{
    public function showAction(User $user)
    {
        $this->render('@Page/Admin/User/Showing/show.html.twig', array(
            'user' => $user,
        ));
    }
}
