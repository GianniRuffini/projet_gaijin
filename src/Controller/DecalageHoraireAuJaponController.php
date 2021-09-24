<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DecalageHoraireAuJaponController extends AbstractController
{
    #[Route('/decalage/horaire/au/japon', name: 'decalage_horaire_au_japon')]
    public function index(): Response
    {
        return $this->render('decalage_horaire_au_japon/index.html.twig', [
            'controller_name' => 'DecalageHoraireAuJaponController',
        ]);
    }
}
