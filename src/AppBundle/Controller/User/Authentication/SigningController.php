<?php

namespace AppBundle\Controller\User\Authentication;


use AppBundle\Entity\User;
use AppBundle\Form\Type\User\Authentication\AuthenticateType;
use AppBundle\Form\Type\User\Registration\RegisterType;
use AppBundle\Service\Util\Console\Model\Message;
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

        $error = $this->get('security.authentication_utils')->getLastAuthenticationError();

        if ($error !== null) {
            $this->container->get('app.util.console')->add($error->getMessage(), Message::TYPE_DANGER, 'fas fa-exclamation-triangle');
        }

        $form = $this->createForm(AuthenticateType::class);

        return $this->render('@Page/User/Authentication/Login/login.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function registerAction(Request $request, $form = null)
    {
        $user = new User();

        if (!$form) {
            $form = $this->createForm(RegisterType::class, $user);

            $form->handleRequest($request);

            if ($form->isSubmitted()) {
                if ($form->isValid()) {
                    $user->setEmail($user->getIdBooster() . '@' . $this->getParameter('email_domain_name'));
                    $this->get('app.business.user')->hashPassword($user);
                    $user->setRoles(array(USER::ROLE_USER));
                    $this->get('app.business.user')->generateToken($user);
                    $this->get('app.mailer.user.registration')->sendRegisterMail($user);
                    return $this->forward('AppBundle:User\Authentication\Signing:sign', array('focus' => 'register'));
                } else {
                    $this->get('app.business.form')->displayFormErrors($form);
                }
            }

            if ($this->get('app.business.request')->isMasterRequest()) {
                return $this->forward('AppBundle:User\Authentication\Signing:sign', array('focus' => 'register', 'form' => $form));
            }
        }


        return $this->render('@Page/User/Authentication/Register/register.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function signAction($focus = 'login', $form = null)
    {
        return $this->render('@Page/User/Authentication/Signing/sign.html.twig',
            array(
                'focus' => $focus,
                'form' => $form,
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
