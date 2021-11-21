<?php

namespace App\Form;

use App\Entity\User;
use App\Form\UserType;
use App\Entity\Commentaires;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class CommentairesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
    
        $builder
            // ->add('user', null, [
            //     'label' => 'Pseudo',
            //     'mapp'
            // ])
            ->add('contenuscommentaire', CKEditorType::class, [
                'label' => 'Votre commentaire',
            ])
            ->add('rgpd', CheckboxType::class, [
                'label' => " J'accepte le règlement général sur la protection des données",
                'constraints' => [
                    new NotBlank() //protege coté serveur
                ]
            ])
            ->add('parent', HiddenType::class, [
                'mapped' => false
            ])
            ->add('envoyer', SubmitType::class)
            ->remove('active')
            ->remove('created_at')
            ->remove('annonces')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commentaires::class,
            'user' => false
        ]);
    }
}
