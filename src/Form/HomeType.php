<?php

namespace App\Form;

use App\Entity\Home;
use App\Entity\CategoryHome;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class HomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('sousTitre')
            ->add('description')
            ->add('imageFile', FileType::class, ["required"=>false])
            ->add('category', EntityType::class, [
                'class' => CategoryHome::class,
                'choice_label' => 'titre',
            ])
            ->remove('active')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Home::class,
        ]);
    }
}
