<?php

namespace AppBundle\Controller\Admin\UserGroup;

use AppBundle\Entity\UserGroup;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShowingController extends Controller
{
    public function showAction(UserGroup $group)
    {
        return $this->render('@Page/Admin/UserGroup/Showing/show.html.twig', array(
            'group' => $group,
        ));
    }
}
