<?php

namespace App\Form;

use App\Entity\Contenus;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContenusType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titreHebergement')
            ->add('sousTitreHebergement')
            ->add('descriptionHebergement')
            ->add('activeHebergement')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contenus::class,
        ]);
    }
}
