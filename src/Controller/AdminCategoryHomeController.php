<?php

namespace App\Controller;

use App\Entity\CategoryHome;
use App\Form\CategoryHomeType;
use App\Repository\CategoryHomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/categorie/home')]
class AdminCategoryHomeController extends AbstractController
{
    #[Route('/', name: 'admin_category_home_index', methods: ['GET'])]
    public function index(CategoryHomeRepository $categoryHomeRepository): Response
    {
        return $this->render('admin_categorie_home/index.html.twig', [
            'category_homes' => $categoryHomeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'admin_category_home_new', methods: ['GET','POST'])]
    public function new(Request $request): Response
    {
        $categoryHome = new CategoryHome();
        $form = $this->createForm(CategoryHomeType::class, $categoryHome);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categoryHome);
            $entityManager->flush();

            return $this->redirectToRoute('admin_category_home_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_categorie_home/new.html.twig', [
            'category_home' => $categoryHome,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_category_home_show', methods: ['GET'])]
    public function show(CategoryHome $categoryHome): Response
    {
        return $this->render('admin_categorie_home/show.html.twig', [
            'category_home' => $categoryHome,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_category_home_edit', methods: ['GET','POST'])]
    public function edit(Request $request, CategoryHome $categoryHome): Response
    {
        $form = $this->createForm(CategoryHomeType::class, $categoryHome);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_category_home_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_categorie_home/edit.html.twig', [
            'category_home' => $categoryHome,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_category_home_delete', methods: ['POST'])]
    public function delete(Request $request, CategoryHome $categoryHome): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categoryHome->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($categoryHome);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_category_home_index', [], Response::HTTP_SEE_OTHER);
    }
}
