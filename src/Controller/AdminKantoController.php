<?php

namespace App\Controller;

use App\Entity\Kanto;
use App\Form\KantoType;
use App\Repository\KantoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/kanto')]
class AdminKantoController extends AbstractController
{
    #[Route('/', name: 'admin_kanto_index', methods: ['GET'])]
    public function index(KantoRepository $kantoRepository): Response
    {
        return $this->render('admin_kanto/index.html.twig', [
            'kantos' => $kantoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'admin_kanto_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $kanto = new Kanto();
        $form = $this->createForm(KantoType::class, $kanto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($kanto);
            $entityManager->flush();

            return $this->redirectToRoute('admin_kanto_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_kanto/new.html.twig', [
            'kanto' => $kanto,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_kanto_show', methods: ['GET'])]
    public function show(Kanto $kanto): Response
    {
        return $this->render('admin_kanto/show.html.twig', [
            'kanto' => $kanto,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_kanto_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Kanto $kanto): Response
    {
        $form = $this->createForm(KantoType::class, $kanto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_kanto_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_kanto/edit.html.twig', [
            'kanto' => $kanto,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_kanto_delete', methods: ['POST'])]
    public function delete(Request $request, Kanto $kanto): Response
    {
        if ($this->isCsrfTokenValid('delete'.$kanto->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($kanto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_kanto_index', [], Response::HTTP_SEE_OTHER);
    }
}
