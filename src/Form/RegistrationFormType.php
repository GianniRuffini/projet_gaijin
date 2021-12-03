<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use App\Form\FormExtension\RepeatedPasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Validator\Constraints\Regex;

class RegistrationFormType extends AbstractType
{
    /**
     * Construisez un formulaire avec des attributs html et des contraintes de validateur.
     *
     * @param FormBuilderInterface<callable> $builder
     * @param array<mixed> $options
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('email')
            ->add('pseudo')
            ->add('plainPassword', PasswordType::class, [
                // au lieu d'être placé directement sur l'objet,
                // ceci est lu et codé dans le contrôleur
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un mot de passe',
                    ]),
                    new Length([
                        'min' => 8,
                        'minMessage' => 'Votre mot de passe doit comporter au moins {{ limit }} caractères',
                        // longueur max autorisée par Symfony pour des raisons de sécurité
                        'max' => 4096,
                    ]),
                    new Regex([
                        'pattern' => "/^(?=.*\d)(?=.*[A-Z])(?=.*[-+!*$@%_])(?!.*(.)\1{2}).*[a-z]/m",
                        'message' => "Votre mot de passe doit contenir 8 caractère et inclure 1 lettre en majuscule, 1 nombre, et 1 caractère spécial."
                        //on augmente la securité avec le regex 
                    ])
                ],
            ])

            ->add('agreeTerms', CheckboxType::class, [
                'label'  => "J'accepte les conditions d'utilisations de ce site.",
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => "Vous devez accepter les conditions d'utilisation de ce site pour vous identifiez",
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
