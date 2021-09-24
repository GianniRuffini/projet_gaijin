<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AvionsEtAeroportsController extends AbstractController
{
    #[Route('/avions/et/aeroports', name: 'avions_et_aeroports')]
    public function index(): Response
    {
        return $this->render('avions_et_aeroports/index.html.twig', [
            'controller_name' => 'AvionsEtAeroportsController',
        ]);
    }
}
