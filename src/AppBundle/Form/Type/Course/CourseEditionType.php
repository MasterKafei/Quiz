<?php


namespace AppBundle\Form\Type\Course;


use AppBundle\Entity\Course;
use AppBundle\Entity\UserGroup;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Test\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CourseEditionType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('groups', EntityType::class, array(
                'class' => UserGroup::class,
                'choice_label' => 'name',
                'expanded' => true,
                'multiple' => true,
            ))
            ->add('save', SubmitType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Course::class,
        ));
    }
}