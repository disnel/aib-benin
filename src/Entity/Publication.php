<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Traits\Timestampable;
use App\Repository\PublicationRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: PublicationRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Publication
{
    use Timestampable;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sousTitre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ssousTitre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $contenu = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nomImage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nomDocument = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slug = null;

    #[ORM\ManyToOne(inversedBy: 'publications')]
    private ?Menu $menu = null;

    #[ORM\Column]
    private ?bool $estSlide = null;

    #[ORM\Column]
    private ?bool $estArticle = null;

    #[ORM\Column]
    private ?bool $estMasque = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $route = null;

    #[ORM\Column]
    private ?bool $estActif = null;

    #[ORM\Column(nullable: true)]
    private ?int $ordreAffichage = null;

    #[ORM\OneToMany(mappedBy: 'publication', targetEntity: Media::class)]
    private Collection $media;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'publications')]
    private ?self $publicationparent = null;

    #[ORM\OneToMany(mappedBy: 'publicationparent', targetEntity: self::class)]
    private Collection $publications;

    public function __construct()
    {
        $this->media = new ArrayCollection();
        $this->publications = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getSousTitre(): ?string
    {
        return $this->sousTitre;
    }

    public function setSousTitre(?string $sousTitre): static
    {
        $this->sousTitre = $sousTitre;

        return $this;
    }

    public function getSsousTitre(): ?string
    {
        return $this->ssousTitre;
    }

    public function setSsousTitre(?string $ssousTitre): static
    {
        $this->ssousTitre = $ssousTitre;

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

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(?string $contenu): static
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getNomImage(): ?string
    {
        return $this->nomImage;
    }

    public function setNomImage(?string $nomImage): static
    {
        $this->nomImage = $nomImage;

        return $this;
    }

    public function getNomDocument(): ?string
    {
        return $this->nomDocument;
    }

    public function setNomDocument(?string $nomDocument): static
    {
        $this->nomDocument = $nomDocument;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getMenu(): ?Menu
    {
        return $this->menu;
    }

    public function setMenu(?Menu $menu): static
    {
        $this->menu = $menu;

        return $this;
    }

    public function isEstSlide(): ?bool
    {
        return $this->estSlide;
    }

    public function setEstSlide(bool $estSlide): static
    {
        $this->estSlide = $estSlide;

        return $this;
    }

    public function isEstArticle(): ?bool
    {
        return $this->estArticle;
    }

    public function setEstArticle(bool $estArticle): static
    {
        $this->estArticle = $estArticle;

        return $this;
    }

    public function isEstMasque(): ?bool
    {
        return $this->estMasque;
    }

    public function setEstMasque(bool $estMasque): static
    {
        $this->estMasque = $estMasque;

        return $this;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getMedia(): Collection
    {
        return $this->media;
    }

    public function addMedium(Media $medium): static
    {
        if (!$this->media->contains($medium)) {
            $this->media->add($medium);
            $medium->setPublication($this);
        }

        return $this;
    }

    public function removeMedium(Media $medium): static
    {
        if ($this->media->removeElement($medium)) {
            // set the owning side to null (unless already changed)
            if ($medium->getPublication() === $this) {
                $medium->setPublication(null);
            }
        }

        return $this;
    }

    public function getPublicationparent(): ?self
    {
        return $this->publicationparent;
    }

    public function setPublicationparent(?self $publicationparent): static
    {
        $this->publicationparent = $publicationparent;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getPublications(): Collection
    {
        return $this->publications;
    }

    public function addPublication(self $publication): static
    {
        if (!$this->publications->contains($publication)) {
            $this->publications->add($publication);
            $publication->setPublicationparent($this);
        }

        return $this;
    }

    public function removePublication(self $publication): static
    {
        if ($this->publications->removeElement($publication)) {
            // set the owning side to null (unless already changed)
            if ($publication->getPublicationparent() === $this) {
                $publication->setPublicationparent(null);
            }
        }

        return $this;
    }

    public function getOrdreAffichage(): ?int
    {
        return $this->ordreAffichage;
    }

    public function setOrdreAffichage(?int $ordreAffichage): static
    {
        $this->ordreAffichage = $ordreAffichage;

        return $this;
    }

    public function isEstActif(): ?bool
    {
        return $this->estActif;
    }

    public function setEstActif(bool $estActif): static
    {
        $this->estActif = $estActif;

        return $this;
    }

    public function getRoute(): ?string
    {
        return $this->route;
    }

    public function setRoute(?string $route): static
    {
        $this->route = $route;

        return $this;
    }
}
