<?php

namespace App\Controller;

use App\Entity\SocieteEtCulture;
use App\Form\SocieteEtCultureType;
use App\Repository\SocieteEtCultureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/societe/et/culture')]
class AdminSocieteEtCultureController extends AbstractController
{
    #[Route('/', name: 'admin_societe_et_culture_index', methods: ['GET'])]
    public function index(SocieteEtCultureRepository $societeEtCultureRepository): Response
    {
        return $this->render('admin_societe_et_culture/index.html.twig', [
            'societe_et_cultures' => $societeEtCultureRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'admin_societe_et_culture_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $societeEtCulture = new SocieteEtCulture();
        $form = $this->createForm(SocieteEtCultureType::class, $societeEtCulture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($societeEtCulture);
            $entityManager->flush();

            return $this->redirectToRoute('admin_societe_et_culture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_societe_et_culture/new.html.twig', [
            'societe_et_culture' => $societeEtCulture,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_societe_et_culture_show', methods: ['GET'])]
    public function show(SocieteEtCulture $societeEtCulture): Response
    {
        return $this->render('admin_societe_et_culture/show.html.twig', [
            'societe_et_culture' => $societeEtCulture,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_societe_et_culture_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SocieteEtCulture $societeEtCulture): Response
    {
        $form = $this->createForm(SocieteEtCultureType::class, $societeEtCulture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_societe_et_culture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_societe_et_culture/edit.html.twig', [
            'societe_et_culture' => $societeEtCulture,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_societe_et_culture_delete', methods: ['POST'])]
    public function delete(Request $request, SocieteEtCulture $societeEtCulture): Response
    {
        if ($this->isCsrfTokenValid('delete'.$societeEtCulture->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($societeEtCulture);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_societe_et_culture_index', [], Response::HTTP_SEE_OTHER);
    }
}
