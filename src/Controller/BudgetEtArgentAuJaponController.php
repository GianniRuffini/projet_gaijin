<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BudgetEtArgentAuJaponController extends AbstractController
{
    #[Route('/budget/et/argent/au/japon', name: 'budget_et_argent_au_japon')]
    public function index(): Response
    {
        return $this->render('budget_et_argent_au_japon/index.html.twig', [
            'controller_name' => 'BudgetEtArgentAuJaponController',
        ]);
    }
}
