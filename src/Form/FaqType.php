<?php

namespace App\Form;

use App\Entity\Faq;
use App\Entity\CategoryFaq;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FaqType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('question')
            ->add('categorie', EntityType::class, [
                'class' => CategoryFaq::class,
                'choice_label' => 'titre',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Faq::class,
        ]);
    }
}
