<?php

namespace App\Controller;

use App\Entity\CategoryFaq;
use App\Form\CategoryFaqType;
use App\Repository\CategoryFaqRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/categori/faq')]
class AdminCategoryFaqController extends AbstractController
{
    #[Route('/', name: 'admin_category_faq_index', methods: ['GET'])]
    public function index(CategoryFaqRepository $categoryFaqRepository): Response
    {
        return $this->render('admin_categori_faq/index.html.twig', [
            'category_faqs' => $categoryFaqRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'admin_category_faq_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $categoryFaq = new CategoryFaq();
        $form = $this->createForm(CategoryFaqType::class, $categoryFaq);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categoryFaq);
            $entityManager->flush();

            return $this->redirectToRoute('admin_category_faq_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_categori_faq/new.html.twig', [
            'category_faq' => $categoryFaq,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_category_faq_show', methods: ['GET'])]
    public function show(CategoryFaq $categoryFaq): Response
    {
        return $this->render('admin_categori_faq/show.html.twig', [
            'category_faq' => $categoryFaq,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_category_faq_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CategoryFaq $categoryFaq): Response
    {
        $form = $this->createForm(CategoryFaqType::class, $categoryFaq);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_category_faq_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_categori_faq/edit.html.twig', [
            'category_faq' => $categoryFaq,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_category_faq_delete', methods: ['POST'])]
    public function delete(Request $request, CategoryFaq $categoryFaq): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categoryFaq->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($categoryFaq);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_category_faq_index', [], Response::HTTP_SEE_OTHER);
    }
}
