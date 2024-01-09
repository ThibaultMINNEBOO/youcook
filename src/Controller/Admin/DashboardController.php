<?php

namespace App\Controller\Admin;

use App\Entity\Allergen;
use App\Entity\Ingredient;
use App\Entity\IngredientCategory;
use App\Entity\Recipe;
use App\Entity\RecipesCategory;
use App\Entity\Tool;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Youcook');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Recettes', 'fa fa-list', Recipe::class);
        yield MenuItem::linkToCrud('Ingrédients', 'fa fa-list', Ingredient::class);
        yield MenuItem::linkToCrud('Catégories d\'ingrédients', 'fa fa-list', IngredientCategory::class);
        yield MenuItem::linkToCrud('Allergènes', 'fa fa-list', Allergen::class);
        yield MenuItem::linkToCrud('Catégories de recettes', 'fa fa-list', RecipesCategory::class);
        yield MenuItem::linkToCrud('Outils', 'fa fa-list', Tool::class);
    }
}
