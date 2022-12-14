<?php

namespace App\Form;

use App\Entity\ScreenContent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScreenContentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Nom de l\'écran'
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Contenu',
                'attr' => [
                    'class' => 'tinymce'
                ]
            ])
            ->add('value1', TextareaType::class, [
                'label' => 'Valeur 1',
                'attr' => [
                    'class' => 'tinymce'
                ]
            ])
            ->add('value2', TextareaType::class, [
                'label' => 'Valeur 2',
                'attr' => [
                    'class' => 'tinymce']
                ])
            ->add('value3', TextareaType::class, [
                'label' => 'Valeur 3',
                'attr' => [
                    'class' => 'tinymce'
                ]
            ])
            ->add('value4', TextareaType::class, [
                'label' => 'Valeur 4',
                'attr' => [
                    'class' => 'tinymce'
                ]
            ])
            ->add('value5', TextareaType::class, [
                'label' => 'Valeur 5',
                'attr' => [
                    'class' => 'tinymce'
                ]
            ])
            ->add('value6', TextareaType::class, [
                'label' => 'Valeur 6',
                'attr' => [
                    'class' => 'tinymce'
                ]
            ])
            ->add('value7', TextareaType::class, [
                'label' => 'Valeur 7',
                'attr' => [
                    'class' => 'tinymce'
                ]
            ])
            ->add('value8', TextareaType::class, [
                'label' => 'Valeur 8',
                'attr' => [
                    'class' => 'tinymce'
                ]
            ])
            ->add('value9', TextareaType::class, [
                'label' => 'Valeur 9',
                'attr' => [
                    'class' => 'tinymce'
                ]
            ])
            ->add('value10', TextareaType::class, [
                'label' => 'Valeur 10',
                'attr' => [
                    'class' => 'tinymce'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ScreenContent::class,
        ]);
    }
}
