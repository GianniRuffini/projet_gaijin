<?php

namespace App\Controller;

use App\Entity\AvionsEtAeroports;
use App\Form\AvionsEtAeroportsType;
use App\Repository\AvionsEtAeroportsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/avions/et/aeroports')]
class AdminAvionsEtAeroportsController extends AbstractController
{
    #[Route('/', name: 'admin_avions_et_aeroports_index', methods: ['GET'])]
    public function index(AvionsEtAeroportsRepository $avionsEtAeroportsRepository): Response
    {
        return $this->render('admin_avions_et_aeroports/index.html.twig', [
            'avions_et_aeroports' => $avionsEtAeroportsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'admin_avions_et_aeroports_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $avionsEtAeroport = new AvionsEtAeroports();
        $form = $this->createForm(AvionsEtAeroportsType::class, $avionsEtAeroport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($avionsEtAeroport);
            $entityManager->flush();

            return $this->redirectToRoute('admin_avions_et_aeroports_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_avions_et_aeroports/new.html.twig', [
            'avions_et_aeroport' => $avionsEtAeroport,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_avions_et_aeroports_show', methods: ['GET'])]
    public function show(AvionsEtAeroports $avionsEtAeroport): Response
    {
        return $this->render('admin_avions_et_aeroports/show.html.twig', [
            'avions_et_aeroport' => $avionsEtAeroport,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_avions_et_aeroports_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AvionsEtAeroports $avionsEtAeroport): Response
    {
        $form = $this->createForm(AvionsEtAeroportsType::class, $avionsEtAeroport);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_avions_et_aeroports_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_avions_et_aeroports/edit.html.twig', [
            'avions_et_aeroport' => $avionsEtAeroport,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_avions_et_aeroports_delete', methods: ['POST'])]
    public function delete(Request $request, AvionsEtAeroports $avionsEtAeroport): Response
    {
        if ($this->isCsrfTokenValid('delete'.$avionsEtAeroport->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($avionsEtAeroport);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_avions_et_aeroports_index', [], Response::HTTP_SEE_OTHER);
    }
}
