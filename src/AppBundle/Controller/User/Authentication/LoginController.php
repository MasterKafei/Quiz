<?php
/**
 * Created by PhpStorm.
 * User: TheMa
 * Date: 17/02/2018
 * Time: 11:47
 */

namespace AppBundle\Controller\User\Authentication;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends Controller
{

    public function loginAction(Request $request)
    {
        $authUtils = $this->get('security.authentication_utils');

        $error = $authUtils->getLastAuthenticationError();
        $lastUsername = $authUtils->getLastUsername();

        return $this->render('@Page/User/Authentication/Login/login.html.twig', array(
            'last_username' => $lastUsername,
            'error' => $error,
        ));
    }

    public function logoutAction()
    {

    }
}