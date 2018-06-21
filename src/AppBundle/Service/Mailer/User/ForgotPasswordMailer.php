<?php

namespace AppBundle\Service\Mailer\User;


use AppBundle\Entity\User;
use AppBundle\Service\Mailer\AbstractMailer;
use AppBundle\Service\Util\Console\Model\Message;

class ForgotPasswordMailer extends AbstractMailer
{
    public function sendForgotPasswordMail(User $user)
    {
        $template = '@Mail/User/ForgotPassword/reset.html.twig';

        $context = array(
            'user' => $user,
        );

        $this->sendMail($template, $context, $user->getEmail());
        $this->container->get('app.util.console')->add('user.forgot_password.mail_send', Message::TYPE_INFO, 'far fa-envelope',array('%mail_address%' => $user->getEmail()));
    }
}
