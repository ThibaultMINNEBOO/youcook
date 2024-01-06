<?php

namespace App\Entity;

use App\Repository\UserAvatarRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: UserAvatarRepository::class)]
#[Vich\Uploadable]
class UserAvatar implements \Serializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Vich\UploadableField(mapping: 'user_avatar', fileNameProperty: 'pictureName')]
    public ?File $pictureFile = null;

    public function getPictureFile(): ?File
    {
        return $this->pictureFile;
    }

    public function setPictureFile(File $picture = null): void
    {
        $this->pictureFile = $picture;

        if (null !== $picture) {
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    #[ORM\Column(length: 255)]
    private ?string $pictureName = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\OneToOne(inversedBy: 'picture', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPictureName(): ?string
    {
        return $this->pictureName;
    }

    public function setPictureName(?string $pictureName): static
    {
        $this->pictureName = $pictureName;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function serialize()
    {
        return serialize([
            $this->id,
            $this->pictureName,
        ]);
    }

    public function unserialize(string $data)
    {
        return list(
            $this->id,
        ) = unserialize($data, ['allowed_classes' => false]);
    }

    public function __serialize(): array
    {
        return [
            $this->id,
            $this->pictureName,
        ];
    }

    public function __unserialize(array $data): void
    {
        list(
            $this->id,
        ) = $data;
    }
}
