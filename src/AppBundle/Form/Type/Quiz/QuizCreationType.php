<?php

namespace AppBundle\Form\Type\Quiz;

use AppBundle\Entity\Category;
use AppBundle\Entity\Course;
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
use Vich\UploaderBundle\Form\Type\VichFileType;

class QuizCreationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                'label' => 'contribution.quiz.creation.title',
                'attr' => array(
                    'class' => 'form-control',
                )
            ))
            ->add('description', TextareaType::class, array(
                'label' => 'contribution.quiz.creation.description',
                'required' => false,
                'attr' => array(
                    'class' => 'form-control',
                )
            ))
            ->add('course', EntityType::class, array(
                'label' => 'contribution.quiz.creation.course',
                'class' => Course::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.title', 'ASC');
                },
                'choice_label' => 'title',
                'attr' => array(
                    'class' => 'form-control',
                )
            ))
            ->add('image', VichFileType::class, array(
                'label' => 'contribution.quiz.creation.image',
                'translation_domain' => 'label',
                'attr' => array(
                    'class' => 'form-control',
                )
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'contribution.quiz.creation.submit',
                'attr' => array(
                    'class' => 'btn btn-primary',
                )
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Quiz::class,
            'translation_domain' => 'label'
        ));
    }
}