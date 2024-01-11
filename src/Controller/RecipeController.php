<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Form\DeleteRecipeType;
use App\Form\RecipeType;
use App\Repository\RecipesCategoryRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use App\Repository\RecipeRepository;

class RecipeController extends AbstractController
{
    #[Route('/recipe', name: 'app_recipe')]
    public function index(RecipesCategoryRepository $recipesCategoryRepository, RecipeRepository $recipeRepository): Response
    {
        return $this->render('recipe/index.html.twig', [
            'categories' => $recipesCategoryRepository->findAll(),
            'recipes' => $recipeRepository->findAll(),
        ]);
    }

    #[Route('/recipe/{id}', name: 'app_recipe_show', requirements: ['id' => '\d+'])]
    public function show(RecipesCategoryRepository $recipesCategoryRepository, Recipe $recipe): Response
    {
        return $this->render('recipe/show.html.twig', ['recipe' => $recipe, 'categories' => $recipesCategoryRepository->findAll()]);
    }

    #[Route('/recipe/create', name: 'app_recipe_create')]
    #[IsGranted('IS_AUTHENTICATED')]
    public function create(Request $request, RecipesCategoryRepository $recipesCategoryRepository, EntityManagerInterface $entityManager, UserRepository $userRepository): Response
    {
        // $user = $userRepository->findBy(['email' => $this->getUser()->getUserIdentifier()]);
        $recipe = new Recipe();
        $form = $this->createForm(RecipeType::class, $recipe);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $user = $userRepository->findBy(['email' => $this->getUser()->getUserIdentifier()]);
            $recipe->setUser($this->getUser());
            $entityManager->persist($recipe);
            $entityManager->flush();

            return $this->redirectToRoute('app_recipe_create');
        }

        return $this->render('recipe/create.html.twig', ['form' => $form->createView(), 'categories' => $recipesCategoryRepository->findAll()]);
    }
    #[Route('/recipe/{id}/delete', name: 'app_recipe_delete', requirements: ['id' => '\d+'])]
    public function delete(Request $request, RecipesCategoryRepository $recipesCategoryRepository, Recipe $recipe, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DeleteRecipeType::class, $recipe);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->remove($recipe);
            $entityManager->flush();
            $this->addFlash('success', 'La recette a été supprimée avec succès.');
            return $this->redirectToRoute('app_recipe');
        }
        return $this->render('recipe/delete.html.twig', [
            'recipe' => $recipe,
            'form' => $form->createView(),
            'categories' => $recipesCategoryRepository->findAll()
        ]);

    }


}
