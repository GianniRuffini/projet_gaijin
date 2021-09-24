<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CuisineJaponaiseController extends AbstractController
{
    #[Route('/cuisine/japonaise', name: 'cuisine_japonaise')]
    public function index(): Response
    {
        return $this->render('cuisine_japonaise/index.html.twig', [
            'controller_name' => 'CuisineJaponaiseController',
        ]);
    }
}
