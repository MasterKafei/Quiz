<?php

namespace AppBundle\Controller\Admin\UserGroup;


use AppBundle\Entity\UserGroup;
use AppBundle\Form\Model\UserGroup\AddUserModel;
use AppBundle\Form\Type\UserGroup\AddUserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AddUserController extends Controller
{
    public function addAction(UserGroup $group, Request $request)
    {
        $form = $this->createForm(AddUserType::class, new AddUserModel());

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $users = $group->getUsers();
            $users[] = $form->getData()->getUser();
            $group->setUsers($users);

            $em = $this->getDoctrine()->getManager();
            $em->persist($group);
            $em->flush();

            return $this->redirectToRoute('app_admin_group_showing_show', array('id' => $group->getId()));
        }

        return $this->render('@Page/Admin/UserGroup/Adding/add.html.twig', array(
            'form' => $form->createView(),
            'group' => $group,
        ));
    }
}
