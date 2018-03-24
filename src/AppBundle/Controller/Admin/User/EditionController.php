<?php

namespace AppBundle\Controller\Admin\User;

use AppBundle\Entity\User;
use AppBundle\Form\Type\User\UserEditionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EditionController extends Controller
{
    public function editAction(Request $request, User $user)
    {
        $form = $this->createForm(UserEditionType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $this->get('app.business.user')->generateToken($user, false);
            if($user->getPlainPassword() !== null)
            {
                $this->get('app.business.user')->hashPassword($user);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('app_admin_user_listing_list');
        }

        return $this->render('@Page/Admin/User/Edition/edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
