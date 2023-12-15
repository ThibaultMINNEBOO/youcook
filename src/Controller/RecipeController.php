<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecipeController extends AbstractController
{
    #[Route('/recipe/cpontroller', name: 'app_recipe_cpontroller')]
    public function index(): Response
    {
        return $this->render('recipe_cpontroller/index.html.twig', [
            'controller_name' => 'RecipeCpontrollerController',
        ]);
    }
}
