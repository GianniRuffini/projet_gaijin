<?php

namespace App\Controller;

use App\Entity\Prefecture;
use App\Repository\PrefectureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrefectureController extends AbstractController
{
    #[Route('/prefecture', name: 'prefecture')]
    public function index(Prefecture $prefecture): Response
    {
        $user = $this->getUser();

        if($prefecture)

        return $this->render('prefecture/index.html.twig', [
            'controller_name' => 'PrefectureController',
        ]);
    }
}
