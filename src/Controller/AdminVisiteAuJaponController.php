<?php

namespace App\Controller;

use App\Entity\VisiteAuJapon;
use App\Form\VisiteAuJaponType;
use App\Repository\VisiteAuJaponRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/visite/au/japon')]
class AdminVisiteAuJaponController extends AbstractController
{
    #[Route('/', name: 'admin_visite_au_japon_index', methods: ['GET'])]
    public function index(VisiteAuJaponRepository $visiteAuJaponRepository): Response
    {
        return $this->render('admin_visite_au_japon/index.html.twig', [
            'visite_au_japons' => $visiteAuJaponRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'admin_visite_au_japon_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $visiteAuJapon = new VisiteAuJapon();
        $form = $this->createForm(VisiteAuJaponType::class, $visiteAuJapon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($visiteAuJapon);
            $entityManager->flush();

            return $this->redirectToRoute('admin_visite_au_japon_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_visite_au_japon/new.html.twig', [
            'visite_au_japon' => $visiteAuJapon,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_visite_au_japon_show', methods: ['GET'])]
    public function show(VisiteAuJapon $visiteAuJapon): Response
    {
        return $this->render('admin_visite_au_japon/show.html.twig', [
            'visite_au_japon' => $visiteAuJapon,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_visite_au_japon_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, VisiteAuJapon $visiteAuJapon): Response
    {
        $form = $this->createForm(VisiteAuJaponType::class, $visiteAuJapon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_visite_au_japon_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_visite_au_japon/edit.html.twig', [
            'visite_au_japon' => $visiteAuJapon,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_visite_au_japon_delete', methods: ['POST'])]
    public function delete(Request $request, VisiteAuJapon $visiteAuJapon): Response
    {
        if ($this->isCsrfTokenValid('delete'.$visiteAuJapon->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($visiteAuJapon);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_visite_au_japon_index', [], Response::HTTP_SEE_OTHER);
    }
}
