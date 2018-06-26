<?php

namespace AppBundle\Form\Type\Vote;


use AppBundle\Entity\Vote;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreationVoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('value', ChoiceType::class, array(
                'expanded' => true,
                'multiple' => false,
                'choices' => array(
                    '+1' => Vote::VOTE_FOR_CONTRIBUTION,
                    '-1' => Vote::VOTE_AGAINST_CONTRIBUTION,
                )
            ))
            ->add('submit', SubmitType::class, array(
                'label' => 'Vote',
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
                'data_class' => Vote::class,
            )
        );
    }
}
