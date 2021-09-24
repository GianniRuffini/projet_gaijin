<?php

namespace App\Controller;

use App\Entity\TelephoneEtInternetAuJapon;
use App\Form\TelephoneEtInternetAuJaponType;
use App\Repository\TelephoneEtInternetAuJaponRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/telephone/et/internet/au/japon')]
class AdminTelephoneEtInternetAuJaponController extends AbstractController
{
    #[Route('/', name: 'admin_telephone_et_internet_au_japon_index', methods: ['GET'])]
    public function index(TelephoneEtInternetAuJaponRepository $telephoneEtInternetAuJaponRepository): Response
    {
        return $this->render('admin_telephone_et_internet_au_japon/index.html.twig', [
            'telephone_et_internet_au_japons' => $telephoneEtInternetAuJaponRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'admin_telephone_et_internet_au_japon_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $telephoneEtInternetAuJapon = new TelephoneEtInternetAuJapon();
        $form = $this->createForm(TelephoneEtInternetAuJaponType::class, $telephoneEtInternetAuJapon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($telephoneEtInternetAuJapon);
            $entityManager->flush();

            return $this->redirectToRoute('admin_telephone_et_internet_au_japon_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_telephone_et_internet_au_japon/new.html.twig', [
            'telephone_et_internet_au_japon' => $telephoneEtInternetAuJapon,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_telephone_et_internet_au_japon_show', methods: ['GET'])]
    public function show(TelephoneEtInternetAuJapon $telephoneEtInternetAuJapon): Response
    {
        return $this->render('admin_telephone_et_internet_au_japon/show.html.twig', [
            'telephone_et_internet_au_japon' => $telephoneEtInternetAuJapon,
        ]);
    }

    #[Route('/{id}/edit', name: 'admin_telephone_et_internet_au_japon_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TelephoneEtInternetAuJapon $telephoneEtInternetAuJapon): Response
    {
        $form = $this->createForm(TelephoneEtInternetAuJaponType::class, $telephoneEtInternetAuJapon);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_telephone_et_internet_au_japon_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_telephone_et_internet_au_japon/edit.html.twig', [
            'telephone_et_internet_au_japon' => $telephoneEtInternetAuJapon,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'admin_telephone_et_internet_au_japon_delete', methods: ['POST'])]
    public function delete(Request $request, TelephoneEtInternetAuJapon $telephoneEtInternetAuJapon): Response
    {
        if ($this->isCsrfTokenValid('delete'.$telephoneEtInternetAuJapon->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($telephoneEtInternetAuJapon);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_telephone_et_internet_au_japon_index', [], Response::HTTP_SEE_OTHER);
    }
}
