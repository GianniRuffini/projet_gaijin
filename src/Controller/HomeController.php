<?php

namespace App\Controller;

use App\Repository\ContenusRepository;
use App\Repository\HomeRepository;
use App\Repository\VideoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(HomeRepository $homeRepository, VideoRepository $videoRepository): Response
    {
        return $this->render('home/index.html.twig', [
            // 'homeContent' => $homeRepository->findOneBy(["active"=>true]),
            'videos' => $videoRepository->findAll(),
        ]);
    }
}
