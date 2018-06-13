<?php


namespace AppBundle\Form\Type\Answer;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class AnswerCreationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('value', CollectionType::class, array(
                'entry_type' => CheckboxType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'label' => false,
            ))
            ->add('submit', SubmitType::class, array(
                'label' => 'submit',
                'translation_domain' => 'action',
            ))
        ;
    }
}