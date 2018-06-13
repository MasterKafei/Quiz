<?php

namespace AppBundle\Controller\User\Authentication;


use AppBundle\Entity\User;
use AppBundle\Form\Type\User\Authentication\AuthenticateType;
use AppBundle\Form\Type\User\Registration\RegisterType;
use SensioLabs\Security\Exception\RuntimeException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SigningController extends Controller
{
    public function loginAction()
    {
        if ($this->get('app.business.request')->isMasterRequest()) {
            return $this->forward('AppBundle:User\Authentication\Signing:sign', array('focus' => 'login'));
        }
        $form = $this->createForm(AuthenticateType::class);

        return $this->render('@Page/User/Authentication/Login/login.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function registerAction(Request $request)
    {
        $user = new User();

        $form = $this->createForm(RegisterType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setEmail($user->getIdBooster() . '@' . $this->getParameter('email_domain_name'));
            $this->get('app.business.user')->hashPassword($user);
            $user->setRoles(array(USER::ROLE_USER));
            $this->get('app.business.user')->generateToken($user);
            $this->get('app.mailer.user.registration')->sendRegisterMail($user);
            return $this->forward('AppBundle:User\Authentication\Signing:sign', array('focus' => 'register'));
        }

        if ($this->get('app.business.request')->isMasterRequest()) {
            return $this->forward('AppBundle:User\Authentication\Signing:sign', array('focus' => 'register'));
        }

        return $this->render('@Page/User/Authentication/Register/register.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function signAction($focus = 'login')
    {
        return $this->render('@Page/User/Authentication/Signing/sign.html.twig',
            array(
                'focus' => $focus,
            )
        );
    }

    public function checkAction()
    {
        throw new RuntimeException('Should never be called');
    }

    public function logoutAction()
    {
        throw new RuntimeException('Should never be called');
    }
}
