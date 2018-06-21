<?php

namespace AppBundle\Form\Extension;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\FormType;

class FormTypeExtension extends AbstractTypeExtension implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function getExtendedType()
    {
        return FormType::class;
    }
}
