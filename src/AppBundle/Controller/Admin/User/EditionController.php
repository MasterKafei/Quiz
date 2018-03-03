<?php

namespace AppBundle\Controller\Admin\User;

use AppBundle\Entity\User;
use AppBundle\Form\Type\User\UserCreationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EditionController extends Controller
{
    public function editAction(Request $request, User $user)
    {
        $form = $this->createForm(UserCreationType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $this->get('app.business.user')->generateToken($user, false);
            $this->get('app.business.user')->hashPassword($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('app_admin_user_listing_list');
        }

        return $this->render('@Page/Admin/User/Listing/list.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
