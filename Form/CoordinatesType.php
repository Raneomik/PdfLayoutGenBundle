<?php

namespace Ramik\PdfLayoutGenBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoordinatesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('x_position', HiddenType::class)
            ->add('y_position', HiddenType::class)
            ->add('height', HiddenType::class)
            ->add('width', HiddenType::class);
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ramik\PdfLayoutGenBundle\Entity\Coordinates'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'coordinates';
    }

    public function getName()
    {
        return 'coordinates';
    }

}
