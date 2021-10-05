<?php

namespace App\Entity;

use App\Repository\FaqRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FaqRepository::class)
 */
class Faq
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $question;

    /**
     * @ORM\ManyToOne(targetEntity=CategoryFaq::class, inversedBy="categorie")
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="faqUser")
     */
    private $faqUser;

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

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(?string $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getCategorie(): ?CategoryFaq
    {
        return $this->categorie;
    }

    public function setCategorie(?CategoryFaq $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getFaqUser(): ?User
    {
        return $this->faqUser;
    }

    public function setFaqUser(?User $faqUser): self
    {
        $this->faqUser = $faqUser;

        return $this;
    }

}
