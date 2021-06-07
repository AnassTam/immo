<?php

namespace App\Entity;

use App\Repository\RealEstateRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=RealEstateRepository::class)
 */
class RealEstate
{

    public const sizes=[
            1=>'Studio',
            2=>'T2',
            3=>'T3',
            4=>'T4',
            5=>'T5',

        ];
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;



    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank
     *
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Length(
     *     min=15
     * )
     * @Assert\Regex(
     *     pattern="/(meince|puree)/",
     *     match=false,
     *     message="Tu ne peux pas dire le m***"
     * )
     *
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\Range(
     *     min = 50,
     *     max=400
     * )
     *
     */
    private $surface;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * Assert\Positive
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     */
    private $rooms;


    /**
     * @ORM\Column(type="boolean")
     */
    private $sold;

    /**
     *
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="realEstates")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="realEstates")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;


    /**
     * @ORM\Column(type="integer")
     *
     */
    private $referenceDuBien;


    /**
     * @ORM\Column(type="integer", nullable=true)
     */

    private $chambre;

    /**
     * @ORM\Column(type="integer", nullable=true)
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
    private $piscine;

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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $exposition;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $anneeConstruction;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $anneeRenovation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $etage;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $charge;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity=TypeTransaction::class, inversedBy="realEstate")
     */
    private $typeTransaction;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $statutAnnonce;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adressePropritaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $villeAdressePropritaidre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $styleDuBien;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getRooms(): ?int
    {
        return $this->rooms;
    }
    public function getDisplayableRooms():string
    {
        $sizes=[
            1=>'Studio',
            2=>'T2',
            3=>'T3',
            4=>'T4',
            5=>'T5',
        ];
        return $sizes[$this->rooms];
    }

    public function setRooms(int $rooms): self
    {
        $this->rooms = $rooms;

        return $this;
    }

    public function getSold(): ?bool
    {
        return $this->sold;
    }

    public function setSold(bool $sold): self
    {
        $this->sold = $sold;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }



    public function getReferenceDuBien(): ?int
    {
        return $this->referenceDuBien;
    }

    public function setReferenceduBien(int $referenceDuBien): self
    {
        $this->referenceDuBien = $referenceDuBien;

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




    public function getChambre(): ?int
    {
        return $this->chambre;
    }

    public function setChambre(?int $chambre): self
    {
        $this->chambre = $chambre;

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

    public function getPiscine(): ?bool
    {
        return $this->piscine;
    }

    public function setPiscine(?bool $piscine): self
    {
        $this->piscine = $piscine;

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





    public function getExposition(): ?string
    {
        return $this->exposition;
    }

    public function setExposition(?string $exposition): self
    {
        $this->exposition = $exposition;

        return $this;
    }

    public function getAnneeConstruction(): ?int
    {
        return $this->anneeConstruction;
    }

    public function setAnneeConstruction(?int $anneeConstruction): self
    {
        $this->anneeConstruction = $anneeConstruction;

        return $this;
    }

    public function getAnneeRenovation(): ?int
    {
        return $this->anneeRenovation;
    }

    public function setAnneeRenovation(?int $anneeRenovation): self
    {
        $this->anneeRenovation = $anneeRenovation;

        return $this;
    }

    public function getEtage(): ?string
    {
        return $this->etage;
    }

    public function setEtage(?string $etage): self
    {
        $this->etage = $etage;

        return $this;
    }

    public function getCharge(): ?int
    {
        return $this->charge;
    }

    public function setCharge(?int $charge): self
    {
        $this->charge = $charge;

        return $this;
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

    public function getTypeTransaction(): ?TypeTransaction
    {
        return $this->typeTransaction;
    }

    public function setTypeTransaction(?TypeTransaction $typeTransaction): self
    {
        $this->typeTransaction = $typeTransaction;

        return $this;
    }

    public function getStatutAnnonce(): ?bool
    {
        return $this->statutAnnonce;
    }

    public function setStatutAnnonce(bool $statutAnnonce): self
    {
        $this->statutAnnonce = $statutAnnonce;

        return $this;
    }

    public function getAdressePropritaire(): ?string
    {
        return $this->adressePropritaire;
    }

    public function setAdressePropritaire(?string $adressePropritaire): self
    {
        $this->adressePropritaire = $adressePropritaire;

        return $this;
    }

    public function getVilleAdressePropritaidre(): ?string
    {
        return $this->villeAdressePropritaidre;
    }

    public function setVilleAdressePropritaidre(?string $villeAdressePropritaidre): self
    {
        $this->villeAdressePropritaidre = $villeAdressePropritaidre;

        return $this;
    }

    public function getStyleDuBien(): ?string
    {
        return $this->styleDuBien;
    }

    public function setStyleDuBien(string $styleDuBien): self
    {
        $this->styleDuBien = $styleDuBien;

        return $this;
    }





}
