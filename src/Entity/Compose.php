<?php

namespace App\Entity;

use App\Repository\ComposeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComposeRepository::class)]
class Compose
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $stepNumber = null;

    #[ORM\ManyToOne(inversedBy: 'composes')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Step $step = null;

    #[ORM\ManyToOne(inversedBy: 'composes')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Recipe $recipe = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStepNumber(): ?int
    {
        return $this->stepNumber;
    }

    public function setStepNumber(int $stepNumber): static
    {
        $this->stepNumber = $stepNumber;

        return $this;
    }

    public function getStep(): ?Step
    {
        return $this->step;
    }

    public function setStep(?Step $step): static
    {
        $this->step = $step;

        return $this;
    }

    public function getRecipe(): ?Recipe
    {
        return $this->recipe;
    }

    public function setRecipe(?Recipe $recipe): Recipe
    {
        $this->recipe = $recipe;

        return $this->recipe;
    }
}
