<?php

namespace App\Controller;

use App\Entity\RecipesCategory;
use App\Repository\RecipeRepository;
use App\Repository\RecipesCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecipeCategoryController extends AbstractController
{
    #[Route('/recipe/category', name: 'app_recipe_category')]
    public function index(): Response
    {
        return $this->render('recipe_category/index.html.twig');
    }

    #[Route('/recipe/category/{id}', name: 'app_recipe_category_show', requirements: ['id' => '\d+'])]
    public function show(RecipesCategory $recipeCategory, RecipesCategoryRepository $recipesCategoryRepository, RecipeRepository $recipes, int $id): Response
    {
        return $this->render('recipe_category/show.html.twig', [
            'recipeCategory' => $recipeCategory,
            'categories' => $recipesCategoryRepository->findAll(),
            'recipes' => $recipes->findWithCategory($id),
        ]);
    }
}
