<?php

namespace App\Entity;

use App\Repository\IngredientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'ingredients', targetEntity: Store::class)]
    private Collection $stores;

    public function __construct()
    {
        $this->stores = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Store>
     */
    public function getStores(): Collection
    {
        return $this->stores;
    }

    public function addStore(Store $store): static
    {
        if (!$this->stores->contains($store)) {
            $this->stores->add($store);
            $store->setIngredients($this);
        }

        return $this;
    }

    public function removeStore(Store $store): static
    {
        if ($this->stores->removeElement($store)) {
            // set the owning side to null (unless already changed)
            if ($store->getIngredients() === $this) {
                $store->setIngredients(null);
            }
        }

        return $this;
    }


}
