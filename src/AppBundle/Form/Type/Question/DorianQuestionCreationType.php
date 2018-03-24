<?php

namespace AppBundle\Form\Type\Question;


use AppBundle\Entity\Question;
use AppBundle\Form\Type\Answer\DorianAnswerCreationType;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DorianQuestionCreationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content', TextType::class, array(
                    'attr' => array(
                        'class' => 'form-control',
                    )
                )
            )
            ->add('answers', CollectionType::class, array(
                'entry_type' => DorianAnswerCreationType::class,
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Question::class,
        ));
    }
}
