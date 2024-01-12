<?php

namespace App\Controller;

use App\Entity\Ingredient;
use App\Form\IngredientType;
use App\Repository\IngredientRepository;
use App\Repository\RecipesCategoryRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

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
    public function show(Ingredient $ingredient, RecipesCategoryRepository $recipesCategoryRepository): Response
    {
        return $this->render('ingredient/show.html.twig', ['ingredientId' => $ingredient->getId(), 'ingredient' => $ingredient, 'categories' => $recipesCategoryRepository->findAll()]);
    }

    #[Route('/ingredient/create', name: 'app_ingredient_create')]
    #[IsGranted('IS_AUTHENTICATED')]
    public function create(EntityManagerInterface $entityManager, Request $request, RecipesCategoryRepository $recipesCategoryRepository): Response
    {
        $ingredient = new Ingredient();
        $form = $this->createForm(IngredientType::class, $ingredient);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ingredient);
            $entityManager->flush();

            return $this->redirectToRoute('app_ingredient_show', ['id' => $ingredient->getId()], 301);
        }


        return $this->render('ingredient/create.html.twig', [
            'form' => $form->createView(),
            'categories' => $recipesCategoryRepository->findAll(),
        ]);
    }
}
