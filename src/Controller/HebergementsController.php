<?php

namespace App\Controller;

use App\Repository\ContenusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HebergementsController extends AbstractController
{
    #[Route('/hebergements', name: 'hebergements')]
    public function index(ContenusRepository $contenusRepository): Response
    {
        return $this->render('hebergements/index.html.twig', [
            'hebergements' => $contenusRepository->findAll(),
        ]);
    }
}
