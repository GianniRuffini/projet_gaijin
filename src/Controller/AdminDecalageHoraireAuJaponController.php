<?php

namespace App\Controller;

use App\Entity\DecalageHoraireAuJapon;
use App\Form\DecalageHoraireAuJaponType;
use App\Repository\DecalageHoraireAuJaponRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/decalage/horaire/au/japon')]
class AdminDecalageHoraireAuJaponController extends AbstractController
{
    #[Route('/', name: 'admin_decalage_horaire_au_japon_index', methods: ['GET'])]
    public function index(DecalageHoraireAuJaponRepository $decalageHoraireAuJaponRepository): Response
    {
        return $this->render('admin_decalage_horaire_au_japon/index.html.twig', [
            'decalage_horaire_au_japons' => $decalageHoraireAuJaponRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'admin_decalage_horaire_au_japon_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $decalageHoraireAuJapon = new DecalageHoraireAuJapon();
        $form = $this->createForm(DecalageHoraireAuJaponType::class, $decalageHoraireAuJapon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($decalageHoraireAuJapon);
            $entityManager->flush();

            return $this->redirectToRoute('admin_decalage_horaire_au_japon_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_decalage_horaire_au_japon/new.html.twig', [
            'decalage_horaire_au_japon' => $decalageHoraireAuJapon,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_decalage_horaire_au_japon_show', methods: ['GET'])]
    public function show(DecalageHoraireAuJapon $decalageHoraireAuJapon): Response
    {
        return $this->render('admin_decalage_horaire_au_japon/show.html.twig', [
            'decalage_horaire_au_japon' => $decalageHoraireAuJapon,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_decalage_horaire_au_japon_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DecalageHoraireAuJapon $decalageHoraireAuJapon): Response
    {
        $form = $this->createForm(DecalageHoraireAuJaponType::class, $decalageHoraireAuJapon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_decalage_horaire_au_japon_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_decalage_horaire_au_japon/edit.html.twig', [
            'decalage_horaire_au_japon' => $decalageHoraireAuJapon,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_decalage_horaire_au_japon_delete', methods: ['POST'])]
    public function delete(Request $request, DecalageHoraireAuJapon $decalageHoraireAuJapon): Response
    {
        if ($this->isCsrfTokenValid('delete'.$decalageHoraireAuJapon->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($decalageHoraireAuJapon);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_decalage_horaire_au_japon_index', [], Response::HTTP_SEE_OTHER);
    }
}
