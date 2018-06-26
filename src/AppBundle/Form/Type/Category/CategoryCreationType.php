<?php
/**
 * Created by PhpStorm.
 * User: TheMa
 * Date: 20/02/2018
 * Time: 12:42
 */

namespace AppBundle\Form\Type\Category;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class CategoryCreationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                'label' => 'Title',
                'attr' => array('class' => 'form-control'),
            ))
            ->add('description', TextareaType::class, array(
                'label' => 'Description',
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