<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class KantoController extends AbstractController
{
    #[Route('/kanto', name: 'kanto')]
    public function index(): Response
    {
        return $this->render('kanto/index.html.twig', [
            'controller_name' => 'KantoController',
        ]);
    }
}
