<?php

namespace App\Entity;

use App\Repository\ContenusRepository;
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
    private $titreHebergement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sousTitreHebergement;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptionHebergement;

    /**
     * @ORM\Column(type="boolean")
     */
    private $activeHebergement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titreGuideDeVoyage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sousTitreGuideDeVoyage;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptionGuideDeVoyage;

    /**
     * @ORM\Column(type="boolean")
     */
    private $activeGuideDeVoyage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreHebergement(): ?string
    {
        return $this->titreHebergement;
    }

    public function setTitreHebergement(?string $titreHebergement): self
    {
        $this->titreHebergement = $titreHebergement;

        return $this;
    }

    public function getSousTitreHebergement(): ?string
    {
        return $this->sousTitreHebergement;
    }

    public function setSousTitreHebergement(?string $sousTitreHebergement): self
    {
        $this->sousTitreHebergement = $sousTitreHebergement;

        return $this;
    }

    public function getDescriptionHebergement(): ?string
    {
        return $this->descriptionHebergement;
    }

    public function setDescriptionHebergement(?string $descriptionHebergement): self
    {
        $this->descriptionHebergement = $descriptionHebergement;

        return $this;
    }

    public function getActiveHebergement(): ?bool
    {
        return $this->activeHebergement;
    }

    public function setActiveHebergement(bool $activeHebergement): self
    {
        $this->activeHebergement = $activeHebergement;

        return $this;
    }

    public function getTitreGuideDeVoyage(): ?string
    {
        return $this->titreGuideDeVoyage;
    }

    public function setTitreGuideDeVoyage(?string $titreGuideDeVoyage): self
    {
        $this->titreGuideDeVoyage = $titreGuideDeVoyage;

        return $this;
    }

    public function getSousTitreGuideDeVoyage(): ?string
    {
        return $this->sousTitreGuideDeVoyage;
    }

    public function setSousTitreGuideDeVoyage(?string $sousTitreGuideDeVoyage): self
    {
        $this->sousTitreGuideDeVoyage = $sousTitreGuideDeVoyage;

        return $this;
    }

    public function getDescriptionGuideDeVoyage(): ?string
    {
        return $this->descriptionGuideDeVoyage;
    }

    public function setDescriptionGuideDeVoyage(?string $descriptionGuideDeVoyage): self
    {
        $this->descriptionGuideDeVoyage = $descriptionGuideDeVoyage;

        return $this;
    }

    public function getActiveGuideDeVoyage(): ?bool
    {
        return $this->activeGuideDeVoyage;
    }

    public function setActiveGuideDeVoyage(bool $activeGuideDeVoyage): self
    {
        $this->activeGuideDeVoyage = $activeGuideDeVoyage;

        return $this;
    }
}
