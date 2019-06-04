<?php
/**
 * Created by PhpStorm.
 * User: belot
 * Date: 18/05/2018
 * Time: 14:29
 */

namespace AppBundle\Form\Type\Course;


use AppBundle\Entity\Course;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CourseCreationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                'label' => 'contribution.course.creation.title',
                'attr' => array('class' => 'form-control'),
            ))
            ->add('description', TextareaType::class, array(
                'label' => 'contribution.course.creation.description',
                'required' => false,
                'attr' => array('class' => 'form-control'),
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'contribution.course.creation.submit',
                'attr' => array('class' => 'btn btn-info pull-right'),
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => Course::class,
                'translation_domain' => 'label'
            )
        );
    }
}