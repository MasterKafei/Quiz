<?php

namespace AppBundle\Form\Type\User\ForgotPassword;


use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditPasswordFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options' => array(
                    'label' => 'user.authentication.forgot_password.change_password.password',
                ),
                'second_options' => array(
                    'label' => 'user.authentication.forgot_password.change_password.repeat_password',
                )
            ))
            ->add('submit', SubmitType::class, array(
                'label' => 'user.authentication.forgot_password.change_password.submit',
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
            'translation_domain' => 'label',
            'validation_groups' => ['registration']
        ));
    }
}
