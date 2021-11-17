<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="Impossible de créer un compte utilisateur avec cet email. ")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * Cette propriété sert à la mise en place d'un select ption pour le choix de rôle au niveau du
     * formulaire de création ou de modification d'un utilisateur
     */
    public $role;

    /**
     * @Assert\Length(
     *      min = 6,
     *      max = 50,
     *      minMessage = "Votre mot de passe doit contenir 6 carractère au minimum",
     *      maxMessage = "Votre mot de passe ne peut pas contenir plus de 50 carractères"
     * )
     * @Assert\IdenticalTo(
     *      propertyPath="confirmPassword",
     *      message="Le message saisi ne corespond pas à la confirmation"
     *      )
     */
    private $plainPassword;

    /**
     * @Assert\Length(
     *      min = 6,
     *      max = 50,
     *      minMessage = "Votre mot de passe doit contenir 6 carractère au minimum",
     *      maxMessage = "Votre mot de passe ne peut pas contenir plus de 50 carractères"
     * )
     * @Assert\IdenticalTo(
     *      propertyPath="password",
     *      message="La confirmation saisie ne correspond pas au mot de passe"
     *      )
     */
    private $confirmPassword;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pseudo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified = false;

    /**
     * @ORM\OneToMany(targetEntity=Faq::class, mappedBy="faqUser")
     */
    private $faqUser;

    /**
     * @ORM\OneToMany(targetEntity=Commentaires::class, mappedBy="authentification")
     */
    private $commentaires;

    /**
     * @ORM\ManyToMany(targetEntity=Prefecture::class, inversedBy="users")
     */
    private $prefectureList;

    public function __construct()
    {
        $this->faqUser = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
        $this->prefectureList = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(?string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    /**
     * Get min = 6,
     */ 
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * Set min = 6,
     *
     * @return  self
     */ 
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    /**
     * Get min = 6,
     */ 
    public function getConfirmPassword()
    {
        return $this->confirmPassword;
    }

    /**
     * Set min = 6,
     *
     * @return  self
     */ 
    public function setConfirmPassword($confirmPassword)
    {
        $this->confirmPassword = $confirmPassword;

        return $this;
    }

    /**
     * Get cette propriété sert à la mise en place d'un select ption pour le choix de rôle au niveau du
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set cette propriété sert à la mise en place d'un select ption pour le choix de rôle au niveau du
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return Collection|Faq[]
     */
    public function getFaqUser(): Collection
    {
        return $this->faqUser;
    }

    public function addFaqUser(Faq $faqUser): self
    {
        if (!$this->faqUser->contains($faqUser)) {
            $this->faqUser[] = $faqUser;
            $faqUser->setFaqUser($this);
        }

        return $this;
    }

    public function removeFaqUser(Faq $faqUser): self
    {
        if ($this->faqUser->removeElement($faqUser)) {
            // set the owning side to null (unless already changed)
            if ($faqUser->getFaqUser() === $this) {
                $faqUser->setFaqUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Commentaires[]
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaires $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setAuthentification($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaires $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getAuthentification() === $this) {
                $commentaire->setAuthentification(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Prefecture[]
     */
    public function getPrefectureList(): Collection
    {
        return $this->prefectureList;
    }

    public function addPrefectureList(Prefecture $prefectureList): self
    {
        if (!$this->prefectureList->contains($prefectureList)) {
            $this->prefectureList[] = $prefectureList;
        }

        return $this;
    }

    public function removePrefectureList(Prefecture $prefectureList): self
    {
        $this->prefectureList->removeElement($prefectureList);

        return $this;
    }
}
