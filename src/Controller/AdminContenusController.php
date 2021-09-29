<?php

namespace App\Controller;

use App\Entity\Contenus;
use App\Form\ContenusType;
use App\Repository\ContenusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/contenus')]
class AdminContenusController extends AbstractController
{
    #[Route('/', name: 'admin_contenus_index', methods: ['GET'])]
    public function index(ContenusRepository $contenusRepository): Response
    {
        return $this->render('admin_contenus/index.html.twig', [
            'contenuses' => $contenusRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'admin_contenus_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $contenu = new Contenus();
        $form = $this->createForm(ContenusType::class, $contenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contenu);
            $entityManager->flush();

            return $this->redirectToRoute('admin_contenus_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_contenus/new.html.twig', [
            'contenu' => $contenu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_contenus_show', methods: ['GET'])]
    public function show(Contenus $contenu): Response
    {
        return $this->render('admin_contenus/show.html.twig', [
            'contenu' => $contenu,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_contenus_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Contenus $contenu): Response
    {
        $form = $this->createForm(ContenusType::class, $contenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_contenus_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_contenus/edit.html.twig', [
            'contenu' => $contenu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_contenus_delete', methods: ['POST'])]
    public function delete(Request $request, Contenus $contenu): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contenu->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contenu);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_contenus_index', [], Response::HTTP_SEE_OTHER);
    }
}
