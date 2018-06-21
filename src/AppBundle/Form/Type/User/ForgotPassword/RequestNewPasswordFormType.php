<?php

namespace AppBundle\Form\Type\User\ForgotPassword;


use AppBundle\Form\Model\ForgotPassword\RequestNewPasswordModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RequestNewPasswordFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idBooster', NumberType::class, array(
                'label' => 'user.authentication.forgot_password.request_new_password.id_booster'
            ))
            ->add('submit', SubmitType::class, array(
                'label' => 'user.authentication.forgot_password.request_new_password.submit',
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => RequestNewPasswordModel::class,
            'translation_domain' => 'label',
        ));
    }
}
