<?php

namespace App\Controller;

use App\Entity\Faq;
use App\Form\FaqType;
use App\Repository\CategoryFaqRepository;
use App\Repository\FaqRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FaqController extends AbstractController
{
    #[Route('/faq', name: 'faq')]
    public function index(): Response
    {
        return $this->render('faq/index.html.twig', [
            'controller_name' => 'FaqController',
        ]);
    }

    public function affichFaq(FaqRepository $faqRepository)
    {
        $faq = $faqRepository->findAll();

        return $this->render('faq/index.html.twig', [
            'titre' =>$faq,
            'categorie' =>$faq,
            'question'=>$faq
        ]);
    }

    #[Route('/faq/new', name: 'faq_new')]
    public function newFaq(Request $request, CategoryFaqRepository $categoryFaqRepository): Response
    {
        $faq = new Faq();
        $form =$this->createFormBuilder($faq)
                    ->add('titre')
                    ->add('categorie')
                    ->add('question')
                    ->getForm();

        return $this->render('faq/new.html.twig', [
            'formFaq' => $form->createView()
        ]);
    }

    #[Route('/faq/{id}', name: 'faq_show')]
    public function showFaq(FaqRepository $faqRepository): Response
    {
        return $this->render('faq/show.html.twig', [
            'faq' => $faqRepository
        ]);
    }

}
