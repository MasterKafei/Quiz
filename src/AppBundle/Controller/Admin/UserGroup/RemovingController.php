<?php

namespace AppBundle\Controller\Admin\UserGroup;

use AppBundle\Entity\UserGroup;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RemovingController extends Controller
{
    public function removeAction(UserGroup $group)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($group);
        $em->flush();

        return $this->redirectToRoute('app_admin_user_group_listing_list');
    }
}
