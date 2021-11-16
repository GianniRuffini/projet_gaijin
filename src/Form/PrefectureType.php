<?php

namespace App\Form;

use App\Entity\Contenus;
use App\Entity\Prefecture;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PrefectureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('description', CKEditorType::class)
            ->add( 'region', EntityType::class, [
            'class' => Contenus::class,
            'choice_label' => 'titre',
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Prefecture::class,
        ]);
    }
}
