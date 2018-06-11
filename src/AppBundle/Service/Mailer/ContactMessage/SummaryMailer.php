<?php

namespace AppBundle\Service\Mailer\ContactMessage;


use AppBundle\Entity\ContactMessage;
use AppBundle\Service\Mailer\AbstractMailer;
use AppBundle\Service\Util\Console\Model\Message;

class SummaryMailer extends AbstractMailer
{
    public function sendSummaryMail(ContactMessage $message)
    {
        $template = '@Mail/ContactMessage/Summary/sum_up.html.twig';

        $context = array(
            'contact_message' => $message,
        );

        $this->sendMail($template, $context, $message->getEmail());
        $this->container->get('app.util.console')->add('contact_message.creation.confirmation', Message::TYPE_SUCCESS, 'fas fa-check');
    }
}
