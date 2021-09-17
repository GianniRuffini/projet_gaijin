<?php

namespace App\Controller;

use App\Entity\CommunauteGaijin;
use App\Form\CommunauteGaijinType;
use App\Repository\CommunauteGaijinRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/communaute/gaijin')]
class AdminCommunauteGaijinController extends AbstractController
{
    #[Route('/', name: 'admin_communaute_gaijin_index', methods: ['GET'])]
    public function index(CommunauteGaijinRepository $communauteGaijinRepository): Response
    {
        return $this->render('admin_communaute_gaijin/index.html.twig', [
            'communaute_gaijins' => $communauteGaijinRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'admin_communaute_gaijin_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $communauteGaijin = new CommunauteGaijin();
        $form = $this->createForm(CommunauteGaijinType::class, $communauteGaijin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($communauteGaijin);
            $entityManager->flush();

            return $this->redirectToRoute('admin_communaute_gaijin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_communaute_gaijin/new.html.twig', [
            'communaute_gaijin' => $communauteGaijin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_communaute_gaijin_show', methods: ['GET'])]
    public function show(CommunauteGaijin $communauteGaijin): Response
    {
        return $this->render('admin_communaute_gaijin/show.html.twig', [
            'communaute_gaijin' => $communauteGaijin,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_communaute_gaijin_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CommunauteGaijin $communauteGaijin): Response
    {
        $form = $this->createForm(CommunauteGaijinType::class, $communauteGaijin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_communaute_gaijin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_communaute_gaijin/edit.html.twig', [
            'communaute_gaijin' => $communauteGaijin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_communaute_gaijin_delete', methods: ['POST'])]
    public function delete(Request $request, CommunauteGaijin $communauteGaijin): Response
    {
        if ($this->isCsrfTokenValid('delete'.$communauteGaijin->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($communauteGaijin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_communaute_gaijin_index', [], Response::HTTP_SEE_OTHER);
    }
}
