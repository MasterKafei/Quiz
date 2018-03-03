<?php
/**
 * Created by PhpStorm.
 * User: TheMa
 * Date: 17/02/2018
 * Time: 18:36
 */

namespace AppBundle\Form\Type\Question;

use AppBundle\Entity\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionCreationType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                'required' => false,
            ))
            ->add('text', TextareaType::class, array())
            ->add('responses', CollectionType::class, array(
                'label' => false,
                'entry_type' => TextType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'entry_options' => array(
                    'attr' => array('class' => 'form-control'),
            )))
            ->add('solution', CollectionType::class, array(
                'label' => false,
                'entry_type' => CheckboxType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'required' => false,
            ))
            ->add('save', SubmitType::class, array())
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Question::class,
        ));
    }
}