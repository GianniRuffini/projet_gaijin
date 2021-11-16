<?php

namespace App\Entity;

use App\Repository\ContenusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContenusRepository::class)
 */
class Contenus
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sousTitre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="type")
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity=Prefecture::class, mappedBy="region")
     */
    private $prefectures;

    public function __construct()
    {
        $this->prefectures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getSousTitre(): ?string
    {
        return $this->sousTitre;
    }

    public function setSousTitre(?string $sousTitre): self
    {
        $this->sousTitre = $sousTitre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Prefecture[]
     */
    public function getPrefectures(): Collection
    {
        return $this->prefectures;
    }

    public function addPrefecture(Prefecture $prefecture): self
    {
        if (!$this->prefectures->contains($prefecture)) {
            $this->prefectures[] = $prefecture;
            $prefecture->setRegion($this);
        }

        return $this;
    }

    public function removePrefecture(Prefecture $prefecture): self
    {
        if ($this->prefectures->removeElement($prefecture)) {
            // set the owning side to null (unless already changed)
            if ($prefecture->getRegion() === $this) {
                $prefecture->setRegion(null);
            }
        }

        return $this;
    }

}
