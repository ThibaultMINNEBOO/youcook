<?php

namespace App\Controller;

use App\Entity\User;
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
        return $this->render('recipe/create.html.twig');
    }
}
