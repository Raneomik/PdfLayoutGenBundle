<?php

namespace Ramik\PdfLayoutGenBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParagraphType extends FieldType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder,$options);
        $builder->add('type', HiddenType::class, [
            'data' => 'PARAGRAPH'
        ]);

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ramik\PdfLayoutGenBundle\Entity\Paragraph'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ramik_pdflayoutgenbundle_paragraph';
    }

    public function getName()
    {
        return 'paragraph_field';
    }

}
