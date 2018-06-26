<?php
/**
 * Created by PhpStorm.
 * User: belot
 * Date: 18/05/2018
 * Time: 14:29
 */

namespace AppBundle\Form\Type\Chapter;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ChapterCreationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                'label' => 'Title',
                'attr' => array('class' => 'form-control'),
            ))
            ->add('text', TextareaType::class, array(
                'label' => 'Text',
                'required' => false,
                'attr' => array('class' => 'form-control'),
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Creation',
                'attr' => array('class' => 'btn btn-info pull-right'),
            ))
        ;
    }
}
