<?php

namespace App\Form;

use App\Entity\Home;
use App\Entity\ContenusAccueil;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ContenusAccueilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('sousTitre')
            ->add('description', CKEditorType::class)
            ->add('imageFile', FileType::class, ["required" => false])
            ->add('home', EntityType::class, [
                'label' => 'Page à éditer',
                'class' => Home::class,
                'choice_label' => 'titre',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContenusAccueil::class,
            'prototype' => true,
            'allow_add' =>true
        ]);
    }
}
