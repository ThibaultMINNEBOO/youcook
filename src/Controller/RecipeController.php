<?php

namespace App\Controller;

use App\Entity\Constitute;
use App\Entity\Recipe;
use App\Entity\User;
use App\Form\RecipeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecipeController extends AbstractController
{
    #[Route('/recipe', name: 'app_recipe')]
    public function index(): Response
    {
        return $this->render('recipe/index.html.twig', [
            'controller_name' => 'RecipeController',
        ]);
    }

    #[Route('/recipe/{id}/create', name: 'app_recipe_create', requirements: ['id' => '\d+'])]
    public function create(User $user, Request $request, EntityManagerInterface $entityManager): Response
    {
        $recipe = new Recipe();
        $constitute = new Constitute();
        $constitute->setRecipe($recipe);
        $form = $this->createForm(RecipeType::class);
        $form->handleRequest($request);

        foreach ($request->request->get('Ingredients') as $ingredient) {
            $constitute->addIngredient($ingredient);
        }
        $recipe->setConstitute($constitute);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($recipe);
            $entityManager->flush();
        }

        return $this->render('recipe/create.html.twig', ['form' => $form->createView()]);
    }
}
