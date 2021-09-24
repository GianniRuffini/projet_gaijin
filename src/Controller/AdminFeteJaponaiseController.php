<?php

namespace App\Controller;

use App\Entity\FeteJaponaise;
use App\Form\FeteJaponaiseType;
use App\Repository\FeteJaponaiseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/fete/japonaise')]
class AdminFeteJaponaiseController extends AbstractController
{
    #[Route('/', name: 'admin_fete_japonaise_index', methods: ['GET'])]
    public function index(FeteJaponaiseRepository $feteJaponaiseRepository): Response
    {
        return $this->render('admin_fete_japonaise/index.html.twig', [
            'fete_japonaises' => $feteJaponaiseRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'admin_fete_japonaise_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $feteJaponaise = new FeteJaponaise();
        $form = $this->createForm(FeteJaponaiseType::class, $feteJaponaise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($feteJaponaise);
            $entityManager->flush();

            return $this->redirectToRoute('admin_fete_japonaise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_fete_japonaise/new.html.twig', [
            'fete_japonaise' => $feteJaponaise,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_fete_japonaise_show', methods: ['GET'])]
    public function show(FeteJaponaise $feteJaponaise): Response
    {
        return $this->render('admin_fete_japonaise/show.html.twig', [
            'fete_japonaise' => $feteJaponaise,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_fete_japonaise_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FeteJaponaise $feteJaponaise): Response
    {
        $form = $this->createForm(FeteJaponaiseType::class, $feteJaponaise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_fete_japonaise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_fete_japonaise/edit.html.twig', [
            'fete_japonaise' => $feteJaponaise,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_fete_japonaise_delete', methods: ['POST'])]
    public function delete(Request $request, FeteJaponaise $feteJaponaise): Response
    {
        if ($this->isCsrfTokenValid('delete'.$feteJaponaise->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($feteJaponaise);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_fete_japonaise_index', [], Response::HTTP_SEE_OTHER);
    }
}
