<?php

namespace App\Controller;

use App\Entity\Hebergements;
use App\Form\HebergementsType;
use App\Repository\HebergementsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/hebergements')]
class AdminHebergementsController extends AbstractController
{
    #[Route('/', name: 'admin_hebergements_index', methods: ['GET'])]
    public function index(HebergementsRepository $hebergementsRepository): Response
    {
        return $this->render('admin_hebergements/index.html.twig', [
            'hebergements' => $hebergementsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'admin_hebergements_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $hebergement = new Hebergements();
        $form = $this->createForm(HebergementsType::class, $hebergement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($hebergement);
            $entityManager->flush();

            return $this->redirectToRoute('admin_hebergements_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_hebergements/new.html.twig', [
            'hebergement' => $hebergement,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_hebergements_show', methods: ['GET'])]
    public function show(Hebergements $hebergement): Response
    {
        return $this->render('admin_hebergements/show.html.twig', [
            'hebergement' => $hebergement,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_hebergements_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Hebergements $hebergement): Response
    {
        $form = $this->createForm(HebergementsType::class, $hebergement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_hebergements_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_hebergements/edit.html.twig', [
            'hebergement' => $hebergement,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_hebergements_delete', methods: ['POST'])]
    public function delete(Request $request, Hebergements $hebergement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$hebergement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($hebergement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_hebergements_index', [], Response::HTTP_SEE_OTHER);
    }
}
