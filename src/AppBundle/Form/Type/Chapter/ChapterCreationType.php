<?php
/**
 * Created by PhpStorm.
 * User: belot
 * Date: 18/05/2018
 * Time: 14:29
 */

namespace AppBundle\Form\Type\Chapter;


use AppBundle\Entity\Chapter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChapterCreationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                'label' => 'contribution.chapter.creation.title',
                'attr' => array('class' => 'form-control'),
            ))
            ->add('text', TextareaType::class, array(
                'label' => 'contribution.chapter.creation.text',
                'required' => false,
                'attr' => array('class' => 'form-control'),
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'contribution.chapter.creation.submit',
                'attr' => array('class' => 'btn btn-info pull-right'),
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => Chapter::class,
                'translation_domain' => 'label'
            )
        );
    }
}
