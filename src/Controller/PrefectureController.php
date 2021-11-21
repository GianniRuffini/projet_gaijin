<?php

namespace App\Controller;

use App\Repository\PrefectureRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PrefectureController extends AbstractController
{
    #[Route('/prefecture', name: 'prefecture')]
    public function index(): Response
    {
        return $this->render('prefecture/index.html.twig', [
            'controller_name' => 'PrefectureController',
        ]);
    }

    #[Route('/prefecture/addfavori')]
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

    #[Route('/prefecture/removefavori/{id}', name: 'deletePrefectureList')]
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
        return $this->redirectToRoute("prefecture");
    }
}
