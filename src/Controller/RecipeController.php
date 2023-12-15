<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RecipeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function create(User $user): Response
    {
        $form = $this->createForm(RecipeType::class);

        return $this->render('recipe/create.html.twig', ['form' => $form->createView()]);
    }
}
