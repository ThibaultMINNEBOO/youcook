<?php

namespace App\Controller;

use App\Entity\Constitute;
use App\Entity\Recipe;
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
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        // $userId = $this->getUser()->getUserIdentifier();
        $recipe = new Recipe();
        $form = $this->createForm(RecipeType::class, $recipe);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /**$finalRecipe = new Recipe();
            foreach ($recipe->getConstitutes() as $ingredient) {
                $constitute = new Constitute();
                $constitute->setIngredient($ingredient);
                $constitute->setRecipe($recipe->getId());
                $constitute->setQuantity(1);
                $constitute->setMeasure('kg');
                $finalRecipe->addConstitute($constitute);
            }
            $finalRecipe->setRecipeCategory($recipe->getRecipeCategory());
            $finalRecipe->setDescription($recipe->getDescription());
            $finalRecipe->setMark($recipe->getMark());
            $finalRecipe->setName($recipe->getName());
            $finalRecipe->setDay($recipe->getDay());
            $finalRecipe->setHour($recipe->getHour());
            $finalRecipe->setMinute($recipe->getMinute());

            $finalRecipe->setDifficulty($recipe->getDifficulty());
            $finalRecipe->setNbPeople($recipe->getNbPeople());
            $entityManager->persist($constitute);
            $entityManager->persist($finalRecipe);**/
            $entityManager->persist($recipe);
            $entityManager->flush();

            // return $this->redirectToRoute("");
        }


        /*if ($form->isSubmitted() && $form->isValid()) {
            $ingredients = $request->request->get('constitutes');

            $finalRecipe = $recipe;
            foreach ($recipe->getConstitutes() as $ingredient) {
                $constitute = new Constitute();
                $constitute->setIngredient($ingredient);
                $constitute->setRecipe($recipe->getId());
                $constitute->setQuantity(1);
                $constitute->setMeasure('kg');
                $finalRecipe->addConstitute($constitute);
            }

            $entityManager->persist($finalRecipe);
            $entityManager->flush();

            // return $this->redirectToRoute("");
        }*/

        return $this->render('recipe/create.html.twig', ['form' => $form->createView()]);
    }
}
