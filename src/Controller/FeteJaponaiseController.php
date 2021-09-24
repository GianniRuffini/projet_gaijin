<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FeteJaponaiseController extends AbstractController
{
    #[Route('/fete/japonaise', name: 'fete_japonaise')]
    public function index(): Response
    {
        return $this->render('fete_japonaise/index.html.twig', [
            'controller_name' => 'FeteJaponaiseController',
        ]);
    }
}
