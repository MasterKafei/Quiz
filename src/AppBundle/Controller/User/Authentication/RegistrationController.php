<?php
/**
 * Created by PhpStorm.
 * User: TheMa
 * Date: 17/02/2018
 * Time: 11:11
 */

namespace AppBundle\Controller\User\Authentication;

use AppBundle\Entity\User;
use AppBundle\Form\Type\User\Authentication\Register\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends Controller
{
    public function registerAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $this->get('app.business.user')->generateToken($user, false);
            $this->get('app.business.user')->hashPassword($user);
            $user->setRoles(array(USER::ROLE_USER));
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->get('app.business.user')->authenticateUser($user);

            return $this->redirectToRoute('app_home_home_index');
        }

        return $this->render('@Page/User/Authentication/Register/register.html.twig', array(
            'form' => $form->createView(),
        ));

    }
}