<?php

namespace AppBundle\Controller\Admin\UserGroup;

use AppBundle\Entity\UserGroup;
use AppBundle\Form\Type\UserGroup\UserGroupCreation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EditionController extends Controller
{
    public function editAction(Request $request, UserGroup $group)
    {
        $form = $this->createForm(UserGroupCreation::class,  $group);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($group);
            $em->flush();

            return $this->redirectToRoute('app_admin_user_group_listing_list');
        }

        return $this->render('@Page/Admin/UserGroup/Edition/edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
