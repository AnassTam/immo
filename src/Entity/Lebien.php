<?php

namespace App\Entity;

use App\Repository\LebienRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LebienRepository::class)
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"lebien" = "Lebien", "appartement" = "Appartement", "house" = "House"})
 *
 */
class Lebien
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
    private $statut;

    /**
     * @ORM\Column(type="integer")
     *
     */
    private $reference;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $localisation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $piece;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $chambre;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $surface;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $standing;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $etatDuBien;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vueDubien;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $eauChaude;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $chauffage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $styleDuBien;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $niveau;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $ascenseur;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $duplex;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $loft;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $dernierEtage;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $avecPiscine;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $balcon;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $garage;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $parking;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $personneHandicapee;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $investissementLocatif;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $visitevirtuelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getReference(): ?int
    {
        return $this->reference;
    }

    public function setReference(int $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getPiece(): ?int
    {
        return $this->piece;
    }

    public function setPiece(?int $piece): self
    {
        $this->piece = $piece;

        return $this;
    }

    public function getChambre(): ?int
    {
        return $this->chambre;
    }

    public function setChambre(?int $chambre): self
    {
        $this->chambre = $chambre;

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(?int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getStanding(): ?string
    {
        return $this->standing;
    }

    public function setStanding(?string $standing): self
    {
        $this->standing = $standing;

        return $this;
    }

    public function getEtatDuBien(): ?string
    {
        return $this->etatDuBien;
    }

    public function setEtatDuBien(?string $etatDuBien): self
    {
        $this->etatDuBien = $etatDuBien;

        return $this;
    }

    public function getVueDubien(): ?string
    {
        return $this->vueDubien;
    }

    public function setVueDubien(?string $vueDubien): self
    {
        $this->vueDubien = $vueDubien;

        return $this;
    }

    public function getEauChaude(): ?string
    {
        return $this->eauChaude;
    }

    public function setEauChaude(?string $eauChaude): self
    {
        $this->eauChaude = $eauChaude;

        return $this;
    }

    public function getChauffage(): ?string
    {
        return $this->chauffage;
    }

    public function setChauffage(?string $chauffage): self
    {
        $this->chauffage = $chauffage;

        return $this;
    }

    public function getStyleDuBien(): ?string
    {
        return $this->styleDuBien;
    }

    public function setStyleDuBien(?string $styleDuBien): self
    {
        $this->styleDuBien = $styleDuBien;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(?string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getAscenseur(): ?bool
    {
        return $this->ascenseur;
    }

    public function setAscenseur(?bool $ascenseur): self
    {
        $this->ascenseur = $ascenseur;

        return $this;
    }

    public function getDuplex(): ?bool
    {
        return $this->duplex;
    }

    public function setDuplex(?bool $duplex): self
    {
        $this->duplex = $duplex;

        return $this;
    }

    public function getLoft(): ?bool
    {
        return $this->loft;
    }

    public function setLoft(?bool $loft): self
    {
        $this->loft = $loft;

        return $this;
    }

    public function getDernierEtage(): ?bool
    {
        return $this->dernierEtage;
    }

    public function setDernierEtage(?bool $dernierEtage): self
    {
        $this->dernierEtage = $dernierEtage;

        return $this;
    }

    public function getAvecPiscine(): ?bool
    {
        return $this->avecPiscine;
    }

    public function setAvecPiscine(?bool $avecPiscine): self
    {
        $this->avecPiscine = $avecPiscine;

        return $this;
    }

    public function getBalcon(): ?bool
    {
        return $this->balcon;
    }

    public function setBalcon(?bool $balcon): self
    {
        $this->balcon = $balcon;

        return $this;
    }

    public function getGarage(): ?bool
    {
        return $this->garage;
    }

    public function setGarage(?bool $garage): self
    {
        $this->garage = $garage;

        return $this;
    }

    public function getParking(): ?bool
    {
        return $this->parking;
    }

    public function setParking(?bool $parking): self
    {
        $this->parking = $parking;

        return $this;
    }

    public function getPersonneHandicapee(): ?bool
    {
        return $this->personneHandicapee;
    }

    public function setPersonneHandicapee(?bool $personneHandicapee): self
    {
        $this->personneHandicapee = $personneHandicapee;

        return $this;
    }

    public function getInvestissementLocatif(): ?bool
    {
        return $this->investissementLocatif;
    }

    public function setInvestissementLocatif(?bool $investissementLocatif): self
    {
        $this->investissementLocatif = $investissementLocatif;

        return $this;
    }

    public function getVisitevirtuelle(): ?bool
    {
        return $this->visitevirtuelle;
    }

    public function setVisitevirtuelle(?bool $visitevirtuelle): self
    {
        $this->visitevirtuelle = $visitevirtuelle;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

}
