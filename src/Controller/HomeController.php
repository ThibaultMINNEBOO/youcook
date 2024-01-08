<?php

namespace App\Controller;

use App\Repository\RecipeRepository;
use App\Repository\RecipesCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(RecipesCategoryRepository $recipesCategoryRepository, RecipeRepository $recipeRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'categories' => $recipesCategoryRepository->findAll(),
            'recipes' => $recipeRepository->findAll(),
        ]);
    }
}
