<?php

namespace App\Controller;

use App\Factory\StoreFactory;
use App\Repository\StoreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StoreController extends AbstractController
{
    #[Route('/store', name: 'app_store')]
    public function index(StoreRepository $storeRepository): Response
    {
        $store = $storeRepository->find('id');

        return $this->render('store/index.html.twig', [
            'store' => $store,
        ]);
    }
}
