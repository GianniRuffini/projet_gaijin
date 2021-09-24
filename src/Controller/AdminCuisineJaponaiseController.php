<?php

namespace App\Controller;

use App\Entity\CuisineJaponaise;
use App\Form\CuisineJaponaiseType;
use App\Repository\CuisineJaponaiseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/cuisine/japonaise')]
class AdminCuisineJaponaiseController extends AbstractController
{
    #[Route('/', name: 'admin_cuisine_japonaise_index', methods: ['GET'])]
    public function index(CuisineJaponaiseRepository $cuisineJaponaiseRepository): Response
    {
        return $this->render('admin_cuisine_japonaise/index.html.twig', [
            'cuisine_japonaises' => $cuisineJaponaiseRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'admin_cuisine_japonaise_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $cuisineJaponaise = new CuisineJaponaise();
        $form = $this->createForm(CuisineJaponaiseType::class, $cuisineJaponaise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cuisineJaponaise);
            $entityManager->flush();

            return $this->redirectToRoute('admin_cuisine_japonaise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_cuisine_japonaise/new.html.twig', [
            'cuisine_japonaise' => $cuisineJaponaise,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_cuisine_japonaise_show', methods: ['GET'])]
    public function show(CuisineJaponaise $cuisineJaponaise): Response
    {
        return $this->render('admin_cuisine_japonaise/show.html.twig', [
            'cuisine_japonaise' => $cuisineJaponaise,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_cuisine_japonaise_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CuisineJaponaise $cuisineJaponaise): Response
    {
        $form = $this->createForm(CuisineJaponaiseType::class, $cuisineJaponaise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_cuisine_japonaise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_cuisine_japonaise/edit.html.twig', [
            'cuisine_japonaise' => $cuisineJaponaise,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_cuisine_japonaise_delete', methods: ['POST'])]
    public function delete(Request $request, CuisineJaponaise $cuisineJaponaise): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cuisineJaponaise->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cuisineJaponaise);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_cuisine_japonaise_index', [], Response::HTTP_SEE_OTHER);
    }
}
