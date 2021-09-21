<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VisiteAuJaponController extends AbstractController
{
    #[Route('/visite/au/japon', name: 'visite_au_japon')]
    public function index(): Response
    {
        return $this->render('visite_au_japon/index.html.twig', [
            'controller_name' => 'VisiteAuJaponController',
        ]);
    }
}
