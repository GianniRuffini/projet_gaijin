<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SocieteEtCultureController extends AbstractController
{
    #[Route('/societe/et/culture', name: 'societe_et_culture')]
    public function index(): Response
    {
        return $this->render('societe_et_culture/index.html.twig', [
            'controller_name' => 'SocieteEtCultureController',
        ]);
    }
}
