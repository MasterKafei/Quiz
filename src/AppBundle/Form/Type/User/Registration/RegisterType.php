<?php

namespace AppBundle\Form\Type\User\Registration;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idBooster', NumberType::class, array(
                'label' => 'user.authentication.register.id_booster',
            ))
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options' => array('label' => 'user.authentication.register.password'),
                'second_options' => array('label' => 'user.authentication.register.repeat_password'),
            ))
            ->add('submit', SubmitType::class, array(
                'label' => 'register',
                'translation_domain' => 'action'
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
            'validation_groups' => ['registration'],
            'translation_domain' => 'label',
        ));
    }
}