<?php

namespace AppBundle\Controller\User\Authentication;


use AppBundle\Entity\User;
use AppBundle\Service\Util\Console\Model\Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EnablingController extends Controller
{
    public function enableAction($id, $token)
    {
        /** @var User $user */
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(array('id' => $id, 'token' => $token));

        if(null === $user)
        {
            throw $this->createNotFoundException('The token or the user doesn\'t exist');
        }

        $user->setEnabled(true);
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        $this->get('app.util.console')->add('user.registration.success', Message::TYPE_SUCCESS, 'far fa-envelope');

        return $this->redirectToRoute('app_user_authentication_signing_login');
    }
}