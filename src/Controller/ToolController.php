<?php

namespace App\Controller;

use App\Entity\Tool;
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
    #[Route('/tool/{id}', name: 'app_tool_show', requirements: ['id' => '\d+'])]
    public function show(Tool $tool): Response
    {
        return $this->render('tool/show.html.twig', ['tool' => $tool]);
    }

}
