<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\ImageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['image:read']],
    denormalizationContext: ['groups' => ['image:write']],
)]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(["image:read", "image:write"])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(["image:read", "image:write"])]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Groups(["image:read", "image:write"])]
    private ?string $path = null;

    #[ORM\ManyToMany(targetEntity: Actualite::class, mappedBy: 'gallery')]
    #[Groups(["image:read", "image:write"])]
    private Collection $gallery;

    public function __construct()
    {
        $this->gallery = new ArrayCollection();
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

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @return Collection<int, Actualite>
     */
    public function getGallery(): Collection
    {
        return $this->gallery;
    }

    public function addGallery(Actualite $gallery): static
    {
        if (!$this->gallery->contains($gallery)) {
            $this->gallery->add($gallery);
            $gallery->addGallery($this);
        }

        return $this;
    }

    public function removeGallery(Actualite $gallery): static
    {
        $this->gallery->removeElement($gallery);
        $gallery->removeGallery($this);

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
