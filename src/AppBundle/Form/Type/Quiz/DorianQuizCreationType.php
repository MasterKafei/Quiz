<?php

namespace AppBundle\Form\Type\Quiz;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class DorianQuizCreationType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', TextType::class, array(
            'attr' => array(
                'class' => 'form-control',
                'placeholder' => 'Enter a title for quiz',
            ),
        ))
        ->add('difficulty', ChoiceType::class, array(
            'choices' => array(
                '5 stars' => 5,
                '4 stars' => 4,
                '3 stars' => 3,
                '2 stars' => 2,
                '1 stars' => 1,
            )
        ))
        ->add('category', ChoiceType::class, array(

        ));
    }
}
