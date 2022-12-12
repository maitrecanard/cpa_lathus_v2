<?php

namespace App\Form;

use App\Entity\ScreenParam;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScreenParamType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('image')
            ->add('setting1')
            ->add('setting2')
            ->add('setting3')
            ->add('setting4')
            ->add('setting5')
            ->add('setting6')
            ->add('setting7')
            ->add('setting8')
            ->add('setting9')
            ->add('setting10')
            ->add('active')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ScreenParam::class,
        ]);
    }
}
