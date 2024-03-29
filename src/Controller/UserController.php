<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ProfileType;
use App\Repository\RecipesCategoryRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class UserController extends AbstractController
{
    #[Route('/profile', name: 'app_user_profile')]
    #[IsGranted('IS_AUTHENTICATED_FULLY')]
    public function index(UserRepository $userRepository, Request $request, EntityManagerInterface $entityManager, RecipesCategoryRepository $recipesCategoryRepository): Response
    {
        $user = $userRepository->findOneBy(['email' => $this->getUser()->getUserIdentifier()]);

        $form = $this->createForm(ProfileType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_login');
        }

        return $this->render('user/index.html.twig', [
            'form' => $form->createView(),
            'users' => $userRepository->findAll(),
            'categories' => $recipesCategoryRepository->findAll(),
        ]);
    }

    #[Route('/user', name: 'app_user')]
    public function listUser(UserRepository $userRepository, RecipesCategoryRepository $recipesCategoryRepository, Request $request): Response
    {
        $search = $request->query->get('search', '');

        return $this->render('user/listUser.html.twig', [
            'users' => $userRepository->searchUser($search),
            'categories' => $recipesCategoryRepository->findAll(),
        ]);
    }

    #[Route('/user/{id}', name: 'app_user_show_recipe')]
    public function show(User $user, RecipesCategoryRepository $recipesCategoryRepository): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
            'categories' => $recipesCategoryRepository->findAll(),
        ]);
    }
}
