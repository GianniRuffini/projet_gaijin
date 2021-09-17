<?php

namespace App\Controller;

use App\Entity\GuideDeVoyage;
use App\Form\GuideDeVoyageType;
use App\Repository\GuideDeVoyageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/guide/de/voyage')]
class AdminGuideDeVoyageController extends AbstractController
{
    #[Route('/', name: 'admin_guide_de_voyage_index', methods: ['GET'])]
    public function index(GuideDeVoyageRepository $guideDeVoyageRepository): Response
    {
        return $this->render('admin_guide_de_voyage/index.html.twig', [
            'guide_de_voyages' => $guideDeVoyageRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'admin_guide_de_voyage_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $guideDeVoyage = new GuideDeVoyage();
        $form = $this->createForm(GuideDeVoyageType::class, $guideDeVoyage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($guideDeVoyage);
            $entityManager->flush();

            return $this->redirectToRoute('admin_guide_de_voyage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_guide_de_voyage/new.html.twig', [
            'guide_de_voyage' => $guideDeVoyage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_guide_de_voyage_show', methods: ['GET'])]
    public function show(GuideDeVoyage $guideDeVoyage): Response
    {
        return $this->render('admin_guide_de_voyage/show.html.twig', [
            'guide_de_voyage' => $guideDeVoyage,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_guide_de_voyage_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, GuideDeVoyage $guideDeVoyage): Response
    {
        $form = $this->createForm(GuideDeVoyageType::class, $guideDeVoyage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('guide_de_voyage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_guide_de_voyage/edit.html.twig', [
            'guide_de_voyage' => $guideDeVoyage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_guide_de_voyage_delete', methods: ['POST'])]
    public function delete(Request $request, GuideDeVoyage $guideDeVoyage): Response
    {
        if ($this->isCsrfTokenValid('delete'.$guideDeVoyage->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($guideDeVoyage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_guide_de_voyage_index', [], Response::HTTP_SEE_OTHER);
    }
}
