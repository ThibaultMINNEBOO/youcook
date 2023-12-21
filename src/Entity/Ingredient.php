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
    private string $name;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $picture = null;

    #[ORM\ManyToOne(inversedBy: 'ingredients')]
    private ?IngredientCategory $category = null;
    private ?Allergen $allergen = null;

    #[ORM\ManyToOne(inversedBy: 'ingredients')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Constitute $constitute = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }

    public function getCategory(): ?IngredientCategory
    {
        return $this->category;
    }

    public function setCategory(?IngredientCategory $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getAllergen(): ?Allergen
    {
        return $this->allergen;
    }

    public function setAllergen(?Allergen $allergen): static
    {
        $this->allergen = $allergen;

        return $this;
    }

    public function getConstitute(): ?Constitute
    {
        return $this->constitute;
    }

    public function setConstitute(?Constitute $constitute): static
    {
        $this->constitute = $constitute;

        return $this;
    }
}
