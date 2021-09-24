<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HebergementsController extends AbstractController
{
    #[Route('/hebergements', name: 'hebergements')]
    public function index(): Response
    {
        return $this->render('hebergements/index.html.twig', [
            'controller_name' => 'HebergementsController',
        ]);
    }
}
