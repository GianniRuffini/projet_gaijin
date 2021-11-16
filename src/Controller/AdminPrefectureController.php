<?php

namespace App\Controller;

use App\Entity\Prefecture;
use App\Form\PrefectureType;
use App\Repository\PrefectureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/prefecture')]
class AdminPrefectureController extends AbstractController
{
    #[Route('/', name: 'admin_prefecture_index', methods: ['GET'])]
    public function index(PrefectureRepository $prefectureRepository): Response
    {
        return $this->render('admin_prefecture/index.html.twig', [
            'prefectures' => $prefectureRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'admin_prefecture_new', methods: ['GET','POST'])]
    public function new(Request $request): Response
    {
        $prefecture = new Prefecture();
        $form = $this->createForm(PrefectureType::class, $prefecture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($prefecture);
            $entityManager->flush();

            return $this->redirectToRoute('admin_prefecture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_prefecture/new.html.twig', [
            'prefecture' => $prefecture,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_prefecture_show', methods: ['GET'])]
    public function show(Prefecture $prefecture): Response
    {
        return $this->render('admin_prefecture/show.html.twig', [
            'prefecture' => $prefecture,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_prefecture_edit', methods: ['GET','POST'])]
    public function edit(Request $request, Prefecture $prefecture): Response
    {
        $form = $this->createForm(PrefectureType::class, $prefecture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_prefecture_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_prefecture/edit.html.twig', [
            'prefecture' => $prefecture,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_prefecture_delete', methods: ['POST'])]
    public function delete(Request $request, Prefecture $prefecture): Response
    {
        if ($this->isCsrfTokenValid('delete'.$prefecture->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($prefecture);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_prefecture_index', [], Response::HTTP_SEE_OTHER);
    }
}
