<?php

namespace App\Form;

use App\Entity\ScreenContent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScreenContentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('content')
            ->add('value1')
            ->add('value2')
            ->add('value3')
            ->add('value4')
            ->add('value5')
            ->add('value6')
            ->add('value7')
            ->add('value8')
            ->add('value9')
            ->add('value10')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ScreenContent::class,
        ]);
    }
}
