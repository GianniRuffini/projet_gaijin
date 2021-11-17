<?php

namespace App\Controller;

use App\Form\UserProfileType;
use App\Repository\ContenusRepository;
use App\Repository\PrefectureRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
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

    #[Route('/profile/addfavori')]
    public function addFavori(Request $request, PrefectureRepository $prefectureRepository): Response
    {
        //on récupère l'id du contenus envoyer par ajax 
        $prefectureID = $request->request->get("id");
        //on récupère le contenus 
        $prefecture = $prefectureRepository->find($prefectureID);
        //on récupère le user connécter
        $user = $this->getUser();
        //on ajoute le contenus dans la liste de l'utilisateur
        $user->addPrefectureList($prefecture);
        //on récupere un entity manager pour faire un persist et un flux
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        //on retourne une reponse
        return new Response("ok");
    }

    #[Route('/profile/removefavori/{id}', name: 'deletePrefectureList')]
    public function removeFavori(int $id, PrefectureRepository $prefectureRepository): Response
    {
        //on récupère le livre 
        $prefecture = $prefectureRepository->find($id);
        //on récupère le user connéter
        $user = $this->getUser();
        //on ajoute le livre dans la liste de l'utilisateur
        $user->removePrefectureList($prefecture);
        //on récupere un entity manager pour faire un persist et un flux
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        //redirection
        return $this->redirectToRoute("profile");
    }
}
