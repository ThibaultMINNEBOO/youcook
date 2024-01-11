<?php

namespace App\Controller;

use App\Entity\Constitute;
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

class RecipeController extends AbstractController
{
    #[Route('/recipe', name: 'app_recipe')]
    public function index(RecipesCategoryRepository $recipesCategoryRepository): Response
    {
        return $this->render('recipe/index.html.twig', [
            'categories' => $recipesCategoryRepository,
        ]);
    }

    #[Route('/recipe/create', name: 'app_recipe_create', requirements: ['id' => '\d+'])]
    #[IsGranted('IS_AUTHENTICATED')]
    public function create(Request $request, RecipesCategoryRepository $recipesCategoryRepository, EntityManagerInterface $entityManager, UserRepository $userRepository): Response
    {
        // $user = $userRepository->findBy(['email' => $this->getUser()->getUserIdentifier()]);
        $recipe = new Recipe();
        $form = $this->createForm(RecipeType::class, $recipe);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
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
