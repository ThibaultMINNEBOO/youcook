<?php

namespace App\Entity;

use App\Repository\IngredientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: IngredientRepository::class)]
class Ingredient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private string $ingredientName;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ingredientPicture = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIngredientName(): string
    {
        return $this->ingredientName;
    }

    public function setIngredientName(string $ingredientName): static
    {
        $this->ingredientName = $ingredientName;

        return $this;
    }

    public function getIngredientPicture(): ?string
    {
        return $this->ingredientPicture;
    }

    public function setIngredientPicture(?string $ingredientPicture): static
    {
        $this->ingredientPicture = $ingredientPicture;

        return $this;
    }
}
