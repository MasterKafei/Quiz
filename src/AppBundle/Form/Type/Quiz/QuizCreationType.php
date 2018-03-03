<?php

namespace AppBundle\Form\Type\Quiz;

use AppBundle\Entity\Category;
use AppBundle\Entity\Quiz;
use AppBundle\Form\Type\DateType;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuizCreationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array())
            ->add('description', TextareaType::class, array(
                'required' => false,
            ))
            ->add('resettable', CheckboxType::class, array(
                'required' => false,
            ))
            ->add('category', EntityType::class, array(
                'class' => Category::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.title', 'ASC');
                },
                'choice_label' => 'title',
            ))
            ->add('startingDate', DateType::class, array(
                'required' => false,
            ))
            ->add('endingDate', DateType::class, array(
                'required' => false,
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Add question',
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Quiz::class,
        ));
    }
}