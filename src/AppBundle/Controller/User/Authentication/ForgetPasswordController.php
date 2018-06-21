<?php

namespace AppBundle\Controller\User\Authentication;


use AppBundle\Entity\User;
use AppBundle\Form\Model\ForgotPassword\RequestNewPasswordModel;
use AppBundle\Form\Type\User\ForgotPassword\EditPasswordFormType;
use AppBundle\Form\Type\User\ForgotPassword\RequestNewPasswordFormType;
use AppBundle\Service\Util\Console\Model\Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ForgetPasswordController extends Controller
{
    public function requestNewPasswordAction(Request $request)
    {
        $requestNewPasswordModel = new RequestNewPasswordModel();
        $form = $this->createForm(RequestNewPasswordFormType::class, $requestNewPasswordModel);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(array('idBooster' => $requestNewPasswordModel->getIdBooster()));

                if (null === $user) {
                    $this->get('app.util.console')->add('user.forgot_password.id_booster.not_found', Message::TYPE_DANGER, 'fas fa-ban');
                } else {
                    $this->get('app.business.user')->requestNewPassword($user);
                }

            } else {
                $this->get('app.business.form')->displayFormErrors($form);
            }
        }

        return $this->render('@Page/User/Authentication/ForgotPassword/request_new_password.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }

    public function changePasswordAction(Request $request, User $user, $token)
    {
        if ($user->getForgotPasswordToken() !== $token) {
            return $this->redirectToRoute('app_user_authentication_signing_login');
        }

        $form = $this->createForm(EditPasswordFormType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $this->get('app.business.user')->hashPassword($user);
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
                $this->get('app.util.console')->add('user.forgot_password.reset_success', Message::TYPE_SUCCESS, 'fas fa-check');
                return $this->redirectToRoute('app_user_authentication_signing_login');
            } else {
                $this->get('app.business.form')->displayFormErrors($form);
            }
        }

        return $this->render('@Page/User/Authentication/ForgotPassword/change_password.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
