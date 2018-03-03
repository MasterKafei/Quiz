<?php

namespace AppBundle\Controller\Admin\User;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RemovingController extends Controller
{
    public function removeAction(User $user)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();

        return $this->redirectToRoute('app_admin_user_listing_list');
    }
}
