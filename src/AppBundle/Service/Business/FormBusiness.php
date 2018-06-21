<?php

namespace AppBundle\Service\Business;

use AppBundle\Service\Util\AbstractContainerAware;
use AppBundle\Service\Util\Console\Model\Message;
use Symfony\Component\Form\FormInterface;

class FormBusiness extends AbstractContainerAware
{
    public function displayFormErrors(FormInterface $form)
    {
        foreach ($form->getErrors(true) as $error) {
            $this->container->get('app.util.console')->add($error->getMessage(), Message::TYPE_DANGER, 'fas fa-times', $error->getMessageParameters(), null, 'validators');
        }
    }
}
