<?php

namespace App\Controller;

use App\Entity\ContenusAccueil;
use App\Form\ContenusAccueilType;
use App\Repository\ContenusAccueilRepository;
use App\Repository\HomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/contenus/accueil')]
class AdminContenusAccueilController extends AbstractController
{
    #[Route('/', name: 'admin_contenus_accueil_index', methods: ['GET'])]
    public function index(ContenusAccueilRepository $contenusAccueilRepository): Response
    {
        return $this->render('admin_contenus_accueil/index.html.twig', [
            'contenus_accueils' => $contenusAccueilRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'admin_contenus_accueil_new', methods: ['GET','POST'])]
    public function new(Request $request, HomeRepository $homeRepository): Response
    {
        $contenusAccueil = new ContenusAccueil();
        $form = $this->createForm(ContenusAccueilType::class, $contenusAccueil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contenusAccueil);
            $entityManager->flush();

            return $this->redirectToRoute('admin_contenus_accueil_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_contenus_accueil/new.html.twig', [
            'contenus_accueil' => $contenusAccueil,
            'home' => $homeRepository->findAll(),
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_contenus_accueil_show', methods: ['GET'])]
    public function show(ContenusAccueil $contenusAccueil): Response
    {
        return $this->render('admin_contenus_accueil/show.html.twig', [
            'contenus_accueil' => $contenusAccueil,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_contenus_accueil_edit', methods: ['GET','POST'])]
    public function edit(Request $request, ContenusAccueil $contenusAccueil): Response
    {
        $form = $this->createForm(ContenusAccueilType::class, $contenusAccueil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_contenus_accueil_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_contenus_accueil/edit.html.twig', [
            'contenus_accueil' => $contenusAccueil,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_contenus_accueil_delete', methods: ['POST'])]
    public function delete(Request $request, ContenusAccueil $contenusAccueil): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contenusAccueil->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contenusAccueil);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_contenus_accueil_index', [], Response::HTTP_SEE_OTHER);
    }
}
