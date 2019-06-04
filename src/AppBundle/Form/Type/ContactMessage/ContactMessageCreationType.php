<?php

namespace AppBundle\Form\Type\ContactMessage;


use AppBundle\Entity\ContactMessage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactMessageCreationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, array(
               'label' => 'First name',
            ))
            ->add('lastName', TextType::class, array(
                'label' => 'Last name',
            ))
            ->add('email', EmailType::class, array(
                'label' => 'Email',
            ))
            ->add('message', TextareaType::class, array(
                'label' => 'Your message',
            ))
            ->add('submit', SubmitType::class, array(
                'label' => 'contact_message.submit',
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => ContactMessage::class,
                'translation_domain' => 'action'
            )
        );
    }
}
