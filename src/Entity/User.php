<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="Il y a déjà un compte avec cet email")
 */
class User implements UserInterface
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
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity=RealEstate::class, mappedBy="owner", orphanRemoval=true)
     */
    private $realEstates;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomUser;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenomUser;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $datenaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $villeUser;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $paysUser;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pieceIdentiteUser;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $justificatifDomicileUser;

    public function __construct()
    {
        $this->realEstates = new ArrayCollection();
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
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
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

    /**
     * @return Collection|RealEstate[]
     */
    public function getRealEstates(): Collection
    {
        return $this->realEstates;
    }

    public function addRealEstate(RealEstate $realEstate): self
    {
        if (!$this->realEstates->contains($realEstate)) {
            $this->realEstates[] = $realEstate;
            $realEstate->setOwner($this);
        }

        return $this;
    }

    public function removeRealEstate(RealEstate $realEstate): self
    {
        if ($this->realEstates->removeElement($realEstate)) {
            // set the owning side to null (unless already changed)
            if ($realEstate->getOwner() === $this) {
                $realEstate->setOwner(null);
            }
        }

        return $this;
    }

    public function getNomUser(): ?string
    {
        return $this->nomUser;
    }

    public function setNomUser(?string $nomUser): self
    {
        $this->nomUser = $nomUser;

        return $this;
    }

    public function getPrenomUser(): ?string
    {
        return $this->prenomUser;
    }

    public function setPrenomUser(?string $prenomUser): self
    {
        $this->prenomUser = $prenomUser;

        return $this;
    }

    public function getDatenaissance(): ?\DateTimeInterface
    {
        return $this->datenaissance;
    }

    public function setDatenaissance(?\DateTimeInterface $datenaissance): self
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    public function getVilleUser(): ?string
    {
        return $this->villeUser;
    }

    public function setVilleUser(?string $villeUser): self
    {
        $this->villeUser = $villeUser;

        return $this;
    }

    public function getPaysUser(): ?string
    {
        return $this->paysUser;
    }

    public function setPaysUser(?string $paysUser): self
    {
        $this->paysUser = $paysUser;

        return $this;
    }

    public function getPieceIdentiteUser(): ?string
    {
        return $this->pieceIdentiteUser;
    }

    public function setPieceIdentiteUser(?string $pieceIdentiteUser): self
    {
        $this->pieceIdentiteUser = $pieceIdentiteUser;

        return $this;
    }

    public function getJustificatifDomicileUser(): ?string
    {
        return $this->justificatifDomicileUser;
    }

    public function setJustificatifDomicileUser(?string $justificatifDomicileUser): self
    {
        $this->justificatifDomicileUser = $justificatifDomicileUser;

        return $this;
    }
}
