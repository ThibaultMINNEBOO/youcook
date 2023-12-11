<?php

namespace App\Entity;

use App\Repository\RecipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecipeRepository::class)]
class Recipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 15)]
    private ?string $difficulty = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $nbPeople = null;

    #[ORM\ManyToOne(inversedBy: 'recipe')]
    private ?Mark $mark = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $time = null;

    #[ORM\ManyToMany(targetEntity: Tool::class, inversedBy: 'recipes')]
    private Collection $tools;

    #[ORM\OneToMany(mappedBy: 'recipe', targetEntity: Compose::class)]
    private Collection $composes;

    #[ORM\ManyToOne(inversedBy: 'recipes')]
    private ?RecipesCategory $recipeCategory = null;

    public function __construct()
    {
        $this->tools = new ArrayCollection();
        $this->composes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDifficulty(): ?string
    {
        return $this->difficulty;
    }

    public function setDifficulty(string $difficulty): static
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getNbPeople(): ?int
    {
        return $this->nbPeople;
    }

    public function setNbPeople(int $nbPeople): static
    {
        $this->nbPeople = $nbPeople;

        return $this;
    }

    public function getMark(): ?Mark
    {
        return $this->mark;
    }

    public function setMark(?Mark $mark): static
    {
        $this->mark = $mark;

        return $this;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(?\DateTimeInterface $time): self
    {
        $this->time = $time;

        return $this;
    }

    /**
     * @return Collection<int, Tool>
     */
    public function getTools(): Collection
    {
        return $this->tools;
    }

    public function addTool(Tool $tool): static
    {
        if (!$this->tools->contains($tool)) {
            $this->tools->add($tool);
        }

        return $this;
    }

    public function removeTool(Tool $tool): static
    {
        $this->tools->removeElement($tool);

        return $this;
    }

    /**
     * @return Collection<int, Compose>
     */
    public function getComposes(): Collection
    {
        return $this->composes;
    }

    public function addCompose(Compose $compose): static
    {
        if (!$this->composes->contains($compose)) {
            $this->composes->add($compose);
            $compose->setRecipe($this);
        }

        return $this;
    }

    public function removeCompose(Compose $compose): static
    {
        if ($this->composes->removeElement($compose)) {
            // set the owning side to null (unless already changed)
            if ($compose->getRecipe() === $this) {
                $compose->setRecipe(null);
            }
        }

        return $this;
    }

    public function getRecipeCategory(): ?RecipesCategory
    {
        return $this->recipeCategory;
    }

    public function setRecipeCategory(?RecipesCategory $recipeCategory): static
    {
        $this->recipeCategory = $recipeCategory;

        return $this;
    }
}
