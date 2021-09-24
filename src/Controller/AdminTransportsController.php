<?php

namespace App\Controller;

use App\Entity\Transports;
use App\Form\TransportsType;
use App\Repository\TransportsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/transports')]
class AdminTransportsController extends AbstractController
{
    #[Route('/', name: 'admin_transports_index', methods: ['GET'])]
    public function index(TransportsRepository $transportsRepository): Response
    {
        return $this->render('admin_transports/index.html.twig', [
            'transports' => $transportsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'admin_transports_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $transport = new Transports();
        $form = $this->createForm(TransportsType::class, $transport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($transport);
            $entityManager->flush();

            return $this->redirectToRoute('admin_transports_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_transports/new.html.twig', [
            'transport' => $transport,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_transports_show', methods: ['GET'])]
    public function show(Transports $transport): Response
    {
        return $this->render('admin_transports/show.html.twig', [
            'transport' => $transport,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_transports_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Transports $transport): Response
    {
        $form = $this->createForm(TransportsType::class, $transport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_transports_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_transports/edit.html.twig', [
            'transport' => $transport,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_transports_delete', methods: ['POST'])]
    public function delete(Request $request, Transports $transport): Response
    {
        if ($this->isCsrfTokenValid('delete'.$transport->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($transport);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_transports_index', [], Response::HTTP_SEE_OTHER);
    }
}
