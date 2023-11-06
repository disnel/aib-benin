<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\MediaRepository;
use App\Entity\Traits\Timestampable;

#[ORM\Entity(repositoryClass: MediaRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Media
{
    use Timestampable;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomImage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $taille = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $extension = null;

    #[ORM\ManyToOne(inversedBy: 'media')]
    private ?Publication $publication = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomImage(): ?string
    {
        return $this->nomImage;
    }

    public function setNomImage(string $nomImage): static
    {
        $this->nomImage = $nomImage;

        return $this;
    }

    public function getTaille(): ?string
    {
        return $this->taille;
    }

    public function setTaille(?string $taille): static
    {
        $this->taille = $taille;

        return $this;
    }

    public function getExtension(): ?string
    {
        return $this->extension;
    }

    public function setExtension(?string $extension): static
    {
        $this->extension = $extension;

        return $this;
    }

    public function getPublication(): ?Publication
    {
        return $this->publication;
    }

    public function setPublication(?Publication $publication): static
    {
        $this->publication = $publication;

        return $this;
    }
}
