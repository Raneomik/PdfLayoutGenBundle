<?php

namespace Raneomik\PdfLayoutGenBundle\Form;

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
            'data_class' => 'Raneomik\PdfLayoutGenBundle\Entity\Paragraph'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'Raneomik_pdflayoutgenbundle_paragraph';
    }

    public function getName()
    {
        return 'paragraph_field';
    }

}
