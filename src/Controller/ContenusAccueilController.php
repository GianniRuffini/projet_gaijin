<?php

namespace App\Controller;

use App\Repository\ContenusAccueilRepository;
use App\Repository\HomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContenusAccueilController extends AbstractController
{
    #[Route('/contenus/accueil', name: 'contenus_accueil')]
    public function index(): Response
    {
        return $this->render('contenus_accueil/index.html.twig', [
            'controller_name' => 'ContenusAccueilController',
        ]);
    }
    
    #[Route('/contenus/accueil/{id}', name: 'show_contenu')]
    public function showContenu(int $id, ContenusAccueilRepository $contenusAccueilRepository, HomeRepository $homeRepository): Response
    {
        return $this->render('contenus_accueil/index.html.twig', [
            'home' => $homeRepository->find($id),
            'contenusAccueil' => $contenusAccueilRepository->find($id)
        ]);
    }
}
