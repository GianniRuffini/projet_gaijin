<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class KansaiController extends AbstractController
{
    #[Route('/kansai', name: 'kansai')]
    public function index(): Response
    {
        return $this->render('kansai/index.html.twig', [
            'controller_name' => 'KansaiController',
        ]);
    }
}
