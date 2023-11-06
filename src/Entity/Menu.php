<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\MenuRepository;
use App\Entity\Traits\Timestampable;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Menu
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
    private ?string $icone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $niveau = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slug = null;

    #[ORM\OneToMany(mappedBy: 'menu', targetEntity: Publication::class)]
    private Collection $publications;

    #[ORM\Column]
    private ?bool $estMasque = null;

    #[ORM\Column(nullable: true)]
    private ?int $ordreAffichage = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'menus')]
    private ?self $menuparent = null;

    #[ORM\OneToMany(mappedBy: 'menuparent', targetEntity: self::class)]
    private Collection $menus;

    public function __construct()
    {
        $this->publications = new ArrayCollection();
        $this->menus = new ArrayCollection();
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

    public function getIcone(): ?string
    {
        return $this->icone;
    }

    public function setIcone(?string $icone): static
    {
        $this->icone = $icone;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(?string $niveau): static
    {
        $this->niveau = $niveau;

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

    /**
     * @return Collection<int, Publication>
     */
    public function getPublications(): Collection
    {
        return $this->publications;
    }

    public function addPublication(Publication $publication): static
    {
        if (!$this->publications->contains($publication)) {
            $this->publications->add($publication);
            $publication->setMenu($this);
        }

        return $this;
    }

    public function removePublication(Publication $publication): static
    {
        if ($this->publications->removeElement($publication)) {
            // set the owning side to null (unless already changed)
            if ($publication->getMenu() === $this) {
                $publication->setMenu(null);
            }
        }

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

    public function getOrdreAffichage(): ?int
    {
        return $this->ordreAffichage;
    }

    public function setOrdreAffichage(?int $ordreAffichage): static
    {
        $this->ordreAffichage = $ordreAffichage;

        return $this;
    }

    public function getMenuparent(): ?self
    {
        return $this->menuparent;
    }

    public function setMenuparent(?self $menuparent): static
    {
        $this->menuparent = $menuparent;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getMenus(): Collection
    {
        return $this->menus;
    }

    public function addMenu(self $menu): static
    {
        if (!$this->menus->contains($menu)) {
            $this->menus->add($menu);
            $menu->setMenuparent($this);
        }

        return $this;
    }

    public function removeMenu(self $menu): static
    {
        if ($this->menus->removeElement($menu)) {
            // set the owning side to null (unless already changed)
            if ($menu->getMenuparent() === $this) {
                $menu->setMenuparent(null);
            }
        }

        return $this;
    }
}
