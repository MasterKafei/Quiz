<?php

namespace AppBundle\Form\Type\User\Profile\Edition;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idBooster', NumberType::class, array(
                'disabled' => true,
            ))
            ->add('firstName', TextType::class, array(
                'required' => false
            ))
            ->add('lastName', TextType::class, array(
                'required' => false
            ))
            ->add('email', EmailType::class, array(
                'disabled' => true,
            ))
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'required' => false,
            ))
            ->add('submit', SubmitType::class, array(
                'label' => 'profile_edition.submit'
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults(
                array(
                    'data_class' => User::class,
                    'translation_domain' => 'action'
                )
            );
    }
}
