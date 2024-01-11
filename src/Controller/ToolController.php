<?php

namespace App\Controller;

use App\Repository\ToolRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ToolController extends AbstractController
{
    #[Route('/tool', name: 'app_tool')]
    public function index(ToolRepository $toolRepository): Response
    {
        $tools = $toolRepository->findBy([], ['name' => 'ASC']);

        return $this->render('tool/index.html.twig', [
            'tools' => $tools,
        ]);
    }
}
