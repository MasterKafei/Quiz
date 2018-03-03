<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType as BaseType;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class DateType
 * @package AppBundle\Form\Type
 */
class DateType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return BaseType::class;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy HH:mm',
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'app_form_type_date';
    }
}
