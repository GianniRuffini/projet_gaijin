<?php

namespace App\Controller;

use App\Entity\Prefecture;
use App\Form\UserProfileType;
use App\Repository\ContenusRepository;
use App\Repository\PrefectureRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'profile')]
    public function index(Request $request, UserPasswordHasherInterface $uphi): Response
    {
        
        $user = $this->getUser();
        $profileForm = $this->createForm(UserProfileType::class, $user);
        $profileForm->handleRequest($request);
        if($profileForm->isSubmitted() && $profileForm->isValid()){
            $plainPassword =$profileForm->getData()->getPlainPassword();
            if(!is_null($plainPassword)){
                $encodedPassword = $uphi->hashPassword($user, $plainPassword);
                $user->setPassword($encodedPassword);
                $this->addFlash('warning', "Votre mot de passe à bien été changé.");
            }
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $this->addFlash('success', "Vos information ont bien été mis a jour.");
            return $this->redirectToRoute("profile");
        }

        return $this->render('profile/index.html.twig', [
            "form"=>$profileForm->createView(),//on passe a la vue le rendu du formulaire
        ]);
    }

    



}
