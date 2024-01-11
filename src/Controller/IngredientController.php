<?php

namespace App\Controller;

use App\Entity\Ingredient;
use App\Repository\IngredientRepository;
use App\Repository\RecipesCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IngredientController extends AbstractController
{
    #[Route('/ingredient', name: 'app_ingredient')]
    public function index(IngredientRepository $ingredientRepository, RecipesCategoryRepository $recipesCategoryRepository): Response
    {
        $ingredients = $ingredientRepository->findBy([], ['name' => 'ASC']);

        return $this->render('ingredient/index.html.twig', [
            'ingredients' => $ingredients,
            'categories' => $recipesCategoryRepository->findAll(),
        ]);
    }

    #[Route('/ingredient/{id}', name: 'app_ingredient_show', requirements: ['ingredientId' => '\d+'])]
    public function show(Ingredient $ingredient): Response
    {
        return $this->render('ingredient/show.html.twig', ['ingredientId' => $ingredient->getId(), 'ingredient' => $ingredient]);
    }
}
