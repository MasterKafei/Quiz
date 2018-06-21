<?php

namespace AppBundle\Service\Subscriber;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\Form\Extension\Validator\EventListener\ValidationListener;
use Symfony\Component\Form\FormEvent;

class FormSubscriber extends ValidationListener implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    //$this->container->get('app.util.console')->add($error->getMessageTemplate(), Message::TYPE_DANGER, 'fas fa-times', $error->getMessageParameters(), null, 'validators');
}
