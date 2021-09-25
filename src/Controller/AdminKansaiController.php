<?php

namespace App\Controller;

use App\Entity\Kansai;
use App\Form\KansaiType;
use App\Repository\KansaiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/kansai')]
class AdminKansaiController extends AbstractController
{
    #[Route('/', name: 'admin_kansai_index', methods: ['GET'])]
    public function index(KansaiRepository $kansaiRepository): Response
    {
        return $this->render('admin_kansai/index.html.twig', [
            'kansais' => $kansaiRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'admin_kansai_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $kansai = new Kansai();
        $form = $this->createForm(KansaiType::class, $kansai);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($kansai);
            $entityManager->flush();

            return $this->redirectToRoute('admin_kansai_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_kansai/new.html.twig', [
            'kansai' => $kansai,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_kansai_show', methods: ['GET'])]
    public function show(Kansai $kansai): Response
    {
        return $this->render('admin_kansai/show.html.twig', [
            'kansai' => $kansai,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_kansai_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Kansai $kansai): Response
    {
        $form = $this->createForm(KansaiType::class, $kansai);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_kansai_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_kansai/edit.html.twig', [
            'kansai' => $kansai,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_kansai_delete', methods: ['POST'])]
    public function delete(Request $request, Kansai $kansai): Response
    {
        if ($this->isCsrfTokenValid('delete'.$kansai->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($kansai);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_kansai_index', [], Response::HTTP_SEE_OTHER);
    }
}
