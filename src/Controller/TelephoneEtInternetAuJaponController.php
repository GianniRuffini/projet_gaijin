<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TelephoneEtInternetAuJaponController extends AbstractController
{
    #[Route('/telephone/et/internet/au/japon', name: 'telephone_et_internet_au_japon')]
    public function index(): Response
    {
        return $this->render('telephone_et_internet_au_japon/index.html.twig', [
            'controller_name' => 'TelephoneEtInternetAuJaponController',
        ]);
    }
}
