<?php

namespace App\Controller;

use App\Entity\Faq;
use App\Form\FaqType;
use App\Form\UserType;
use DateTimeImmutable;
use App\Entity\CategoryFaq;
use App\Entity\Commentaires;
use App\Form\CategoryFaqType;
use App\Form\CommentairesType;
use App\Repository\FaqRepository;
use App\Repository\UserRepository;
use App\Repository\CategoryRepository;
use Doctrine\Persistence\ObjectManager;
use App\Repository\CategoryFaqRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

        $user = $this->getUser();

        $form = $this->createFormBuilder($faq)
                ->add('titre')
                ->add('categorie')
                ->add('question')
                ->getForm();
        
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $user->addFaqUser($faq);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($faq);
            $entityManager->flush();
            
            $this->addFlash('success', 'Votre question à bien été envoyé');
            return $this->redirectToRoute('faq', [], Response::HTTP_SEE_OTHER);

        }

        return $this->render('faq/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/faq/{id}', name: 'faq_show')]
    public function showFaq(FaqRepository $faqRepository, Request $request, UserRepository $userRepository ,int $id): Response
    {
        $faq = $faqRepository->findOneBy(['id' => $id]);

        if (!$faq) {
            throw new NotFoundHttpException('Pas de question trouvée');
        }

        //Partie commentaire
        //on crée le commantaire "vierge"
        $commentaire = new Commentaires;

        //on recupère le User
        $user = $this->getUser();

        //on génère le formulaire
        $form = $this->createForm(CommentairesType::class, $commentaire, ['user'=>$user]);

        $form->handleRequest($request);

        //traitement du formulaire
        if($form->isSubmitted() && $form->isValid()){
            $commentaire->setCreatedAt(new DateTimeImmutable());
            $commentaire->setAnnonces($faq);

            //on récupère le contenu du champ parent
            $parentid = $form->get("parent")->getData();

            //on va chercher le commentaire correspondant
            $em= $this->getDoctrine()->getManager();

            if($parentid != null){
                $parent = $em->getRepository(Commentaires::class)->find($parentid);
            }

            //on definit le parent
            $commentaire->setParent($parent ?? null);
            $commentaire->setUser($user);

            $em->persist($commentaire);
            $em->flush();

            $this->addFlash('success', 'Votre commentaire à bien été envoyé');
            return $this->redirectToRoute('faq_show', ['id'=>$faq->getId()]);
        }

        return $this->render('faq/show.html.twig', [
            'faq' => $faqRepository->find($id),
            'form'=> $form->createView(),
            'user' => $userRepository
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

    #[Route('/faq/{id}/edit', name: 'faq_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Faq $faq): Response
    {
        $form = $this->createForm(FaqType::class, $faq);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('profile', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('faq/edit.html.twig', [
            'faq'=> $faq,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'faq_delete', methods: ['GET','POST'])]
    public function delete(Request $request, Faq $faq): Response
    {
        if ($this->isCsrfTokenValid('delete' . $faq->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($faq);
            $entityManager->flush();
        }

        return $this->redirectToRoute('profile', [], Response::HTTP_SEE_OTHER);
    }


}
