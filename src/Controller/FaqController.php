<?php

namespace App\Controller;

use App\Entity\Faq;
use App\Form\FaqType;
use App\Repository\CategoryFaqRepository;
use App\Repository\CategoryRepository;
use App\Repository\FaqRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FaqController extends AbstractController
{
    #[Route('/faq', name: 'faq')]
    public function index(FaqRepository $faqRepository, CategoryFaqRepository $categoryFaqRepository): Response
    {
        return $this->render('faq/index.html.twig', [
            'faqs' => $faqRepository->findDernierFaq(),
            'categorie' => $categoryFaqRepository->findAll()
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

    #[Route('/faq/new', name: 'faq_new', methods: ['GET', 'POST'])]
    public function newFaq(Request $request): Response
    {
        $faq = new Faq();

        $form = $this->createFormBuilder($faq)
                ->add('titre')
                ->add('categorie')
                ->add('question')
                ->getForm();
        
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($faq);
            $entityManager->flush();
            
            return $this->redirectToRoute('faq', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('faq/new.html.twig', [
            'formFaq' => $form->createView()
        ]);
    }

    #[Route('/faq/{id}', name: 'faq_show')]
    public function showFaq(FaqRepository $faqRepository, int $id): Response
    {
        return $this->render('faq/show.html.twig', [
            'faq' => $faqRepository->find($id)
        ]);
    }
    
    #[Route('/faq/categorie/{id}', name: 'faq_show_categorie')]
    public function showCategorie(FaqRepository $faqRepository, CategoryFaqRepository $categoryFaqRepository , int $id): Response
    {
        return $this->render('faq/show_categorie.html.twig', [
            'faq' => $faqRepository->findAll(),
            'categorie' => $categoryFaqRepository->find($id)
        ]);
    }

}
