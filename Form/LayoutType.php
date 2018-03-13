<?php

namespace Ramik\PdfLayoutGenBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LayoutType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('fields', CollectionType::class, [
            'entry_type' => FieldType::class,
            'allow_add' => true,
            'allow_delete' => true,
            'prototype' => true,
            'prototype_name' => 'field__name__',
            'entry_options' => array(
                // options on the rendered TagTypes
            ),
        ])
            ->add('Submit', SubmitType::class);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ramik\PdfLayoutGenBundle\Entity\Layout'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ramik_pdflayoutgenbundle_layout';
    }


}
