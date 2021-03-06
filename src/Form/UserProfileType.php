<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('firstname')
            ->add('email', EmailType::class)
            ->add('pseudo')
            ->add('plainPassword', PasswordType::class, ["label"=>"Changer le mot de passe", "required"=>false])
            ->add('confirmPassword', PasswordType::class,["label"=>"Confirmer mot de passe", "required"=>false])
            ->add('country', CountryType::class)
            ->remove('roles')
            ->remove('password')
            ->remove('isVerified')
            ->add('Modifier', SubmitType::class, [ 'attr'=>["class"=>"btn-success mt-3"] ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
