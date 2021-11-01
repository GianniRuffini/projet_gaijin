<?php 

namespace App\Form\FormExtension;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RepeatedPasswordType extends AbstractType
{
    // je me base sur la class repeatedtype 
    public function getParent(): string
    {
        return RepeatedType::class;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        // on lui transmet le tableau de repeatedType 
        $resolver->setDefaults([
            'type'              => PasswordType::class,
            'invalid_message'   => "Les mots de passe saisis ne correspondent pas.",
            'required'          => true,
            'first_options'     => [
                'label' => "Mot de passe",
                'label_attr' => [
                    'title'  => 'Pour des raisons de sécurité, votre mot de passe doit contenir au minimum 4 caractère'
                ],
                'attr'          => [
                    'pattern'   => "^(?=.*[a-zà-Ÿ])(?=.*[A-ZÀ-Ÿ])(?=.*[0-9])(?=.*[â-zà-ÿA-ZÀ-Ý0-9]).{12,}$",
                    'title'     => "Pour des raisons de sécurité, votre mot de passe doit contenir au minimum 1 majusclule 1 chiffre et 1 caractère spécial",
                    'maxlength' => 255
                ]
            ],
            'second_options'    => [
                'label'         => "Confirmer le mot de passe",
                'label_attr'    => [
                    'title'     => 'Confirmez votre mot de passe.',
                ],
                'attr'          => [
                    'pattern'   => "^(?=.*[a-zà-Ÿ])(?=.*[A-ZÀ-Ÿ])(?=.*[0-9])(?=.*[â-zà-ÿA-ZÀ-Ý0-9]).{12,}$",
                    'title'     => 'Confirmez votre mot de passe.',
                    'maxlength' => 255
                ]
            ]
        ]);
    }
}