<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GuideDeVoyageController extends AbstractController
{
    #[Route('/guide/de/voyage', name: 'guide_de_voyage')]
    public function index(): Response
    {
        return $this->render('guide_de_voyage/index.html.twig', [
            'controller_name' => 'GuideDeVoyageController',
        ]);
    }
}
