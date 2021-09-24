<?php

namespace App\Controller;

use App\Entity\BudgetEtArgentAuJapon;
use App\Form\BudgetEtArgentAuJaponType;
use App\Repository\BudgetEtArgentAuJaponRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/budget/et/argent/au/japon')]
class AdminBudgetEtArgentAuJaponController extends AbstractController
{
    #[Route('/', name: 'admin_budget_et_argent_au_japon_index', methods: ['GET'])]
    public function index(BudgetEtArgentAuJaponRepository $budgetEtArgentAuJaponRepository): Response
    {
        return $this->render('admin_budget_et_argent_au_japon/index.html.twig', [
            'budget_et_argent_au_japons' => $budgetEtArgentAuJaponRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'admin_budget_et_argent_au_japon_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $budgetEtArgentAuJapon = new BudgetEtArgentAuJapon();
        $form = $this->createForm(BudgetEtArgentAuJaponType::class, $budgetEtArgentAuJapon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($budgetEtArgentAuJapon);
            $entityManager->flush();

            return $this->redirectToRoute('admin_budget_et_argent_au_japon_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_budget_et_argent_au_japon/new.html.twig', [
            'budget_et_argent_au_japon' => $budgetEtArgentAuJapon,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_budget_et_argent_au_japon_show', methods: ['GET'])]
    public function show(BudgetEtArgentAuJapon $budgetEtArgentAuJapon): Response
    {
        return $this->render('admin_budget_et_argent_au_japon/show.html.twig', [
            'budget_et_argent_au_japon' => $budgetEtArgentAuJapon,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_budget_et_argent_au_japon_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, BudgetEtArgentAuJapon $budgetEtArgentAuJapon): Response
    {
        $form = $this->createForm(BudgetEtArgentAuJaponType::class, $budgetEtArgentAuJapon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_budget_et_argent_au_japon_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_budget_et_argent_au_japon/edit.html.twig', [
            'budget_et_argent_au_japon' => $budgetEtArgentAuJapon,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_budget_et_argent_au_japon_delete', methods: ['POST'])]
    public function delete(Request $request, BudgetEtArgentAuJapon $budgetEtArgentAuJapon): Response
    {
        if ($this->isCsrfTokenValid('delete'.$budgetEtArgentAuJapon->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($budgetEtArgentAuJapon);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_budget_et_argent_au_japon_index', [], Response::HTTP_SEE_OTHER);
    }
}