<?php

namespace App\Controller;

use App\Entity\Tool;
use App\Entity\ToolCategory;
use App\Form\ToolType;
use App\Repository\ToolRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/tool/create', name: 'app_tool_create')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $tool = new Tool();
        $formTool = $this->createForm(ToolType::class, $tool);
        $formTool->add('toolCategory', EntityType::class, [
            'class' => ToolCategory::class,
            'choice_label' => 'name',
            'data' => $tool->getToolCategory(),
        ]);

        $formTool->handleRequest($request);
        if ($formTool->isSubmitted() && $formTool->isValid()) {
            $entityManager->persist($tool);
            $entityManager->flush();

            return $this->redirectToRoute('app_tool_show', ['id' => $tool->getId()]);
        }

        return $this->render('tool/create.html.twig', [
            'form' => $formTool->createView(),
        ]);
    }
}
