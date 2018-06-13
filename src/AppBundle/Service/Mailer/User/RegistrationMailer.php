<?php

namespace AppBundle\Service\Mailer\User;

use AppBundle\Entity\User;
use AppBundle\Service\Mailer\AbstractMailer;
use AppBundle\Service\Util\Console\Model\Message;

class RegistrationMailer extends AbstractMailer
{

    /**
     * @param User $user
     */
    public function sendRegisterMail(User $user)
    {
        $template = '@Mail/User/Registration/register.html.twig';

        $context = array(
            'user' => $user,
            );

        $this->sendMail($template, $context, $user->getEmail());
        $this->container->get('app.util.console')->add('user.registration.mail_sended', Message::TYPE_INFO, 'far fa-envelope',array('%mail_address%' => $user->getEmail()));
    }
}
