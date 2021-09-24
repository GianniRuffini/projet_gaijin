<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TransportsController extends AbstractController
{
    #[Route('/transports', name: 'transports')]
    public function index(): Response
    {
        return $this->render('transports/index.html.twig', [
            'controller_name' => 'TransportsController',
        ]);
    }
}
