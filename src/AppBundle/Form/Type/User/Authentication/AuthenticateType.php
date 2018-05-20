<?php

namespace AppBundle\Form\Type\User\Authentication;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Routing\Router;

class AuthenticateType extends AbstractType
{
    protected $router;

    /**
     * AuthenticateType constructor.
     *
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            '_username',
            TextType::class,
            array(
                'label' => 'Your ID booster',
            )
        )->add(
            '_password',
            PasswordType::class,
            array(
                'label' => 'Password',
            )
        )->add(
            '_remember_me',
            CheckboxType::class,
            array(
                'label' => 'Remember me',
                'required' => false,
            )
        )->add(
            '_csrf_token',
            HiddenType::class
        )->add(
            '_target_path',
            HiddenType::class
        )->add(
            'submit',
            SubmitType::class,
            array(
                'label' => 'login',
                'translation_domain' => 'action',
            )
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'action' => $this->router->generate('app_user_authentication_signing_check'),
                'method' => 'POST',
                'csrf_protection' => false,
                'translation_domain' => 'label',
            )
        );
    }

    public function getBlockPrefix()
    {
        return null;
    }
}
