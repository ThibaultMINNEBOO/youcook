<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Entity\User;
use App\Form\RecipeType;
use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecipeController extends AbstractController
{
    #[Route('/recipe', name: 'app_recipe')]
    public function index(RecipeRepository $recipeRepository): Response
    {
        $recipes = $recipeRepository->findAll();

        return $this->render('recipe/index.html.twig', [
            'recipes' => $recipes,
        ]);
    }

    #[Route('/recipe/{id}/create', name: 'app_recipe_create', requirements: ['id' => '\d+'])]
    public function create(User $user): Response
    {
        $form = $this->createForm(RecipeType::class);

        return $this->render('recipe/create.html.twig', ['form' => $form->createView()]);
    }


    #[Route('/recipe/{id}', name: 'app_recipe_show', requirements: ['id' => '\d+'])]
    public function show(Recipe $recipe): Response
    {
        return $this->render('recipe/show.html.twig', ['recipe' => $recipe]);
    }
}
