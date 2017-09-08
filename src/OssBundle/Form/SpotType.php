<?php

namespace OssBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SpotType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('spotType')
            ->add('spotAcces')
            ->add('lattitude')
            ->add('longitude')
            ->add('area')
            ->add('fishInSpot', CollectionType::class, array(
                'entry_type'=>FishInSpotType::class,
                'allow_add'=>true,
                'allow_delete'=>true,
                'prototype'=>true,
                'by_reference'=>false))
            ->add('Submit', SubmitType::class);
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'OssBundle\Entity\Spot'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ossbundle_spot';
    }


}
