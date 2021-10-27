<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\ContenusRepository;
use Entity\Repository\CategoryRepository as RepositoryCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'category')]
    public function index(): Response
    {
        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }

    
    #[Route('/category/{catId}', name: 'show_cat')]
    public function showCat(int $catId, CategoryRepository $categoryRepository): Response
    {
        $cat = $categoryRepository->find($catId);
        return $this->render('category/category.html.twig', [
            'cat' => $cat,
        ]);
    }

    #[Route('/category/content/{contentId}', name: 'show_content')]
    public function showContent(int $contentId, ContenusRepository $contenusRepository): Response
    {
        return $this->render('category/contenu.html.twig', [
            'contenu' => $contenusRepository->find($contentId)
        ]);
    }

    public function categoryMenu(CategoryRepository $categoryRepository){
        $cats = $categoryRepository->findAll();

        return $this->render('category/_category-menu.html.twig', ["cats"=>$cats]);
    }
}
