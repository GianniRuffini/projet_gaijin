<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\HomeRepository;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Serializable;

/**
 * @ORM\Entity(repositoryClass=HomeRepository::class)
 * @Vich\Uploadable
 */
class Home implements Serializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
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
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $active;

    /**
     * @ORM\ManyToOne(targetEntity=CategoryHome::class, inversedBy="homes")
     */
    private $Category;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="accueil", fileNameProperty="imageName")
     * 
     * @var File|null
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imageName;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $imageSize;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity=ContenusAccueil::class, mappedBy="home")
     */
    private $contenusAccueil;

    public function __construct()
    {
        $this->contenusAccueil = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getSousTitre(): ?string
    {
        return $this->sousTitre;
    }

    public function setSousTitre(string $sousTitre): self
    {
        $this->sousTitre = $sousTitre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getCategory(): ?CategoryHome
    {
        return $this->Category;
    }

    public function setCategory(?CategoryHome $Category): self
    {
        $this->Category = $Category;

        return $this;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(?string $imageName): self
    {
        $this->imageName = $imageName;

        return $this;
    }

    public function getImageSize(): ?int
    {
        return $this->imageSize;
    }

    public function setImageSize(?int $imageSize): self
    {
        $this->imageSize = $imageSize;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection|ContenusAccueil[]
     */
    public function getContenusAccueil(): Collection
    {
        return $this->contenusAccueil;
    }

    public function addContenusAccueil(ContenusAccueil $contenusAccueil): self
    {
        if (!$this->contenusAccueil->contains($contenusAccueil)) {
            $this->contenusAccueil[] = $contenusAccueil;
            $contenusAccueil->setHome($this);
        }

        return $this;
    }

    public function removeContenusAccueil(ContenusAccueil $contenusAccueil): self
    {
        if ($this->contenusAccueil->removeElement($contenusAccueil)) {
            // set the owning side to null (unless already changed)
            if ($contenusAccueil->getHome() === $this) {
                $contenusAccueil->setHome(null);
            }
        }

        return $this;
    }

    public function serialize()
    {
        $this->imageFile = base64_encode($this->imageFile);
    }

    public function unserialize($data)
    {
        $this->imageFile = base64_decode($data);
    }

}
