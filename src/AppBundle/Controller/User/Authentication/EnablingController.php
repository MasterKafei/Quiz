<?php

namespace AppBundle\Controller\User\Authentication;


use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EnablingController extends Controller
{
    public function enableAction(String $token)
    {
        /** @var User $user */
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(array('token' => $token));

        if(null === $user)
        {
            throw $this->createNotFoundException('The token doesn\'t exist');
        }

        $user->setEnabled(true);
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return $this->render('@Page/User/Authentication/Enabling/enable.html.twig', array(
            'user' => $user,
        ));
    }
}