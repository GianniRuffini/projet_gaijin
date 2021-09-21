<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommunauteGaijinController extends AbstractController
{
    #[Route('/communaute/gaijin', name: 'communaute_gaijin')]
    public function index(): Response
    {
        return $this->render('communaute_gaijin/index.html.twig', [
            'controller_name' => 'CommunauteGaijinController',
        ]);
    }
}
