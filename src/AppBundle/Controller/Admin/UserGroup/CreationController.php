<?php

namespace AppBundle\Controller\Admin\UserGroup;

use AppBundle\Entity\UserGroup;
use AppBundle\Form\Type\UserGroup\UserGroupCreation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CreationController extends Controller
{
    /**
     * Create UserGroup
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request)
    {
        $group = new UserGroup();
        $form = $this->createForm(UserGroupCreation::class, $group);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($group);
            $em->flush();

            return $this->redirectToRoute('app_admin_user_group_listing_list');
        }

        return $this->render('@Page/Admin/UserGroup/Creation/create.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
