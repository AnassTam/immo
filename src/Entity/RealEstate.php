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
    private $adresseProprietaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $villeAdresseProprietaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $styleDuBien;

    /**
     *  @ORM\Column(type="boolean", nullable=true)
     */
    private $AdoucisseurEau;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cheminee;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $internet;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $airConditionne;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $stores;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $videSanitaire;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $doubleVitrage;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $aspirateurCentralisee;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $voletsRoulantsElectrique;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $fenetresCoulissante;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $tripleVitrage;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $panneauSolaires;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $borneVoitureElectrique;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $abriVoiture;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $arrosage;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $puits;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $barbecue;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $eclairageExterieur;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $source;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $fibreOptique;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $alarmeIncendie;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $buanderieCommune;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $concierge;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $alarme;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $boolean;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $porteBlindee;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $digicode;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $gardien;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $videoSurveillance;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $interphone;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $videophone;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $aeroport;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $aeroportDistance;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $centreVille;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $centreVilleDistance;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $creche;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $crecheDistance;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $gare;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $medecin;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $piscinePublique;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $supermarche;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $metro;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $autoroute;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cinema;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $ecolePrimaire;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $gareDistance;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $medecinDistance;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $piscinePubliqueDistance;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $supermarcheDistance;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $metroDistance;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $autorouteDistance;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $cinemaDistance;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ecolePrimaireDistance;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $electricite;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cuisine;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $cuisineSurface;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $chambre1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $chambre1Surface;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $chambre2;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $chambre2Surface;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $chambre3;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $chambre3Surface;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $salon;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $salonSurface;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $balconSurface;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $garageSurface;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $gaz;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $categorieAnnonce;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $disponibilite;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nombrePiece;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $entree;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $entreeSurface;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $elctriciteValeur;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $gazValeur;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $taxeFonciere;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $taxeHabitation;


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

    public function getAdresseProprietaire(): ?string
    {
        return $this->adresseProprietaire;
    }

    public function setAdresseProprietaire(?string $adresseProprietaire): self
    {
        $this->adressePropritaire = $adresseProprietaire;

        return $this;
    }

    public function getVilleAdresseProprietaire(): ?string
    {
        return $this->villeAdresseProprietaire;
    }

    public function setVilleAdresseProprietaire(?string $villeAdresseProprietaire): self
    {
        $this->villeAdresseProprietaire = $villeAdresseProprietaire;

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

    public function getAdoucisseurEau(): ?string
    {
        return $this->AdoucisseurEau;
    }

    public function setAdoucisseurEau(?string $AdoucisseurEau): self
    {
        $this->AdoucisseurEau = $AdoucisseurEau;

        return $this;
    }

    public function getCheminee(): ?bool
    {
        return $this->cheminee;
    }

    public function setCheminee(?bool $cheminee): self
    {
        $this->cheminee = $cheminee;

        return $this;
    }

    public function getInternet(): ?bool
    {
        return $this->internet;
    }

    public function setInternet(?bool $internet): self
    {
        $this->internet = $internet;

        return $this;
    }

    public function getAirConditionne(): ?bool
    {
        return $this->airConditionne;
    }

    public function setAirConditionne(?bool $airConditionne): self
    {
        $this->airConditionne = $airConditionne;

        return $this;
    }

    public function getStores(): ?bool
    {
        return $this->stores;
    }

    public function setStores(?bool $stores): self
    {
        $this->stores = $stores;

        return $this;
    }

    public function getVideSanitaire(): ?bool
    {
        return $this->videSanitaire;
    }

    public function setVideSanitaire(?bool $videSanitaire): self
    {
        $this->videSanitaire = $videSanitaire;

        return $this;
    }

    public function getDoubleVitrage(): ?bool
    {
        return $this->doubleVitrage;
    }

    public function setDoubleVitrage(?bool $doubleVitrage): self
    {
        $this->doubleVitrage = $doubleVitrage;

        return $this;
    }

    public function getAspirateurCentralisee(): ?bool
    {
        return $this->aspirateurCentralisee;
    }

    public function setAspirateurCentralisee(?bool $aspirateurCentralisee): self
    {
        $this->aspirateurCentralisee = $aspirateurCentralisee;

        return $this;
    }

    public function getVoletsRoulantsElectrique(): ?bool
    {
        return $this->voletsRoulantsElectrique;
    }

    public function setVoletsRoulantsElectrique(?bool $voletsRoulantsElectrique): self
    {
        $this->voletsRoulantsElectrique = $voletsRoulantsElectrique;

        return $this;
    }

    public function getFenetresCoulissante(): ?bool
    {
        return $this->fenetresCoulissante;
    }

    public function setFenetresCoulissante(?bool $fenetresCoulissante): self
    {
        $this->fenetresCoulissante = $fenetresCoulissante;

        return $this;
    }

    public function getTripleVitrage(): ?bool
    {
        return $this->tripleVitrage;
    }

    public function setTripleVitrage(?bool $tripleVitrage): self
    {
        $this->tripleVitrage = $tripleVitrage;

        return $this;
    }

    public function getPanneauSolaires(): ?bool
    {
        return $this->panneauSolaires;
    }

    public function setPanneauSolaires(?bool $panneauSolaires): self
    {
        $this->panneauSolaires = $panneauSolaires;

        return $this;
    }

    public function getBorneVoitureElectrique(): ?bool
    {
        return $this->borneVoitureElectrique;
    }

    public function setBorneVoitureElectrique(?bool $borneVoitureElectrique): self
    {
        $this->borneVoitureElectrique = $borneVoitureElectrique;

        return $this;
    }

    public function getAbriVoiture(): ?bool
    {
        return $this->abriVoiture;
    }

    public function setAbriVoiture(?bool $abriVoiture): self
    {
        $this->abriVoiture = $abriVoiture;

        return $this;
    }

    public function getArrosage(): ?bool
    {
        return $this->arrosage;
    }

    public function setArrosage(?bool $arrosage): self
    {
        $this->arrosage = $arrosage;

        return $this;
    }

    public function getPuits(): ?bool
    {
        return $this->puits;
    }

    public function setPuits(?bool $puits): self
    {
        $this->puits = $puits;

        return $this;
    }

    public function getBarbecue(): ?bool
    {
        return $this->barbecue;
    }

    public function setBarbecue(?bool $barbecue): self
    {
        $this->barbecue = $barbecue;

        return $this;
    }

    public function getEclairageExterieur(): ?bool
    {
        return $this->eclairageExterieur;
    }

    public function setEclairageExterieur(?bool $eclairageExterieur): self
    {
        $this->eclairageExterieur = $eclairageExterieur;

        return $this;
    }

    public function getSource(): ?bool
    {
        return $this->source;
    }

    public function setSource(?bool $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getFibreOptique(): ?bool
    {
        return $this->fibreOptique;
    }

    public function setFibreOptique(?bool $fibreOptique): self
    {
        $this->fibreOptique = $fibreOptique;

        return $this;
    }

    public function getAlarmeIncendie(): ?bool
    {
        return $this->alarmeIncendie;
    }

    public function setAlarmeIncendie(?bool $alarmeIncendie): self
    {
        $this->alarmeIncendie = $alarmeIncendie;

        return $this;
    }

    public function getBuanderieCommune(): ?bool
    {
        return $this->buanderieCommune;
    }

    public function setBuanderieCommune(?bool $buanderieCommune): self
    {
        $this->buanderieCommune = $buanderieCommune;

        return $this;
    }

    public function getConcierge(): ?bool
    {
        return $this->concierge;
    }

    public function setConcierge(?bool $concierge): self
    {
        $this->concierge = $concierge;

        return $this;
    }

    public function getAlarme(): ?bool
    {
        return $this->alarme;
    }

    public function setAlarme(bool $alarme): self
    {
        $this->alarme = $alarme;

        return $this;
    }

    public function getBoolean(): ?bool
    {
        return $this->boolean;
    }

    public function setBoolean(?bool $boolean): self
    {
        $this->boolean = $boolean;

        return $this;
    }

    public function getPorteBlindee(): ?bool
    {
        return $this->porteBlindee;
    }

    public function setPorteBlindee(?bool $porteBlindee): self
    {
        $this->porteBlindee = $porteBlindee;

        return $this;
    }

    public function getDigicode(): ?bool
    {
        return $this->digicode;
    }

    public function setDigicode(?bool $digicode): self
    {
        $this->digicode = $digicode;

        return $this;
    }

    public function getGardien(): ?bool
    {
        return $this->gardien;
    }

    public function setGardien(?bool $gardien): self
    {
        $this->gardien = $gardien;

        return $this;
    }

    public function getVideoSurveillance(): ?bool
    {
        return $this->videoSurveillance;
    }

    public function setVideoSurveillance(?bool $videoSurveillance): self
    {
        $this->videoSurveillance = $videoSurveillance;

        return $this;
    }

    public function getInterphone(): ?bool
    {
        return $this->interphone;
    }

    public function setInterphone(?bool $interphone): self
    {
        $this->interphone = $interphone;

        return $this;
    }

    public function getVideophone(): ?bool
    {
        return $this->videophone;
    }

    public function setVideophone(?bool $videophone): self
    {
        $this->videophone = $videophone;

        return $this;
    }

    public function getAeroport(): ?bool
    {
        return $this->aeroport;
    }

    public function setAeroport(?bool $aeroport): self
    {
        $this->aeroport = $aeroport;

        return $this;
    }

    public function getAeroportDistance(): ?int
    {
        return $this->aeroportDistance;
    }

    public function setAeroportDistance(?int $aeroportDistance): self
    {
        $this->aeroportDistance = $aeroportDistance;

        return $this;
    }

    public function getCentreVille(): ?bool
    {
        return $this->centreVille;
    }

    public function setCentreVille(?bool $centreVille): self
    {
        $this->centreVille = $centreVille;

        return $this;
    }

    public function getCentreVilleDistance(): ?int
    {
        return $this->centreVilleDistance;
    }

    public function setCentreVilleDistance(?int $centreVilleDistance): self
    {
        $this->centreVilleDistance = $centreVilleDistance;

        return $this;
    }

    public function getCreche(): ?bool
    {
        return $this->creche;
    }

    public function setCreche(?bool $creche): self
    {
        $this->creche = $creche;

        return $this;
    }

    public function getCrecheDistance(): ?int
    {
        return $this->crecheDistance;
    }

    public function setCrecheDistance(?int $crecheDistance): self
    {
        $this->crecheDistance = $crecheDistance;

        return $this;
    }

    public function getGare(): ?int
    {
        return $this->gare;
    }

    public function setGare(?int $gare): self
    {
        $this->gare = $gare;

        return $this;
    }

    public function getMedecin(): ?int
    {
        return $this->medecin;
    }

    public function setMedecin(?int $medecin): self
    {
        $this->medecin = $medecin;

        return $this;
    }

    public function getPiscinePublique(): ?int
    {
        return $this->piscinePublique;
    }

    public function setPiscinePublique(?int $piscinePublique): self
    {
        $this->piscinePublique = $piscinePublique;

        return $this;
    }

    public function getSupermarche(): ?int
    {
        return $this->supermarche;
    }

    public function setSupermarche(?int $supermarche): self
    {
        $this->supermarche = $supermarche;

        return $this;
    }

    public function getMetro(): ?int
    {
        return $this->metro;
    }

    public function setMetro(?int $metro): self
    {
        $this->metro = $metro;

        return $this;
    }

    public function getAutoroute(): ?int
    {
        return $this->autoroute;
    }

    public function setAutoroute(?int $autoroute): self
    {
        $this->autoroute = $autoroute;

        return $this;
    }

    public function getCinema(): ?int
    {
        return $this->cinema;
    }

    public function setCinema(?int $cinema): self
    {
        $this->cinema = $cinema;

        return $this;
    }

    public function getEcolePrimaire(): ?int
    {
        return $this->ecolePrimaire;
    }

    public function setEcolePrimaire(?int $ecolePrimaire): self
    {
        $this->ecolePrimaire = $ecolePrimaire;

        return $this;
    }

    public function getGareDistance(): ?int
    {
        return $this->gareDistance;
    }

    public function setGareDistance(?int $gareDistance): self
    {
        $this->gareDistance = $gareDistance;

        return $this;
    }

    public function getMedecinDistance(): ?int
    {
        return $this->medecinDistance;
    }

    public function setMedecinDistance(?int $medecinDistance): self
    {
        $this->medecinDistance = $medecinDistance;

        return $this;
    }

    public function getPiscinePubliqueDistance(): ?int
    {
        return $this->piscinePubliqueDistance;
    }

    public function setPiscinePubliqueDistance(?int $piscinePubliqueDistance): self
    {
        $this->piscinePubliqueDistance = $piscinePubliqueDistance;

        return $this;
    }

    public function getSupermarcheDistance(): ?int
    {
        return $this->supermarcheDistance;
    }

    public function setSupermarcheDistance(?int $supermarcheDistance): self
    {
        $this->supermarcheDistance = $supermarcheDistance;

        return $this;
    }

    public function getMetroDistance(): ?int
    {
        return $this->metroDistance;
    }

    public function setMetroDistance(?int $metroDistance): self
    {
        $this->metroDistance = $metroDistance;

        return $this;
    }

    public function getAutorouteDistance(): ?int
    {
        return $this->autorouteDistance;
    }

    public function setAutorouteDistance(?int $autorouteDistance): self
    {
        $this->autorouteDistance = $autorouteDistance;

        return $this;
    }

    public function getCinemaDistance(): ?int
    {
        return $this->cinemaDistance;
    }

    public function setCinemaDistance(?int $cinemaDistance): self
    {
        $this->cinemaDistance = $cinemaDistance;

        return $this;
    }

    public function getEcolePrimaireDistance(): ?int
    {
        return $this->ecolePrimaireDistance;
    }

    public function setEcolePrimaireDistance(?int $ecolePrimaireDistance): self
    {
        $this->ecolePrimaireDistance = $ecolePrimaireDistance;

        return $this;
    }

    public function getElectricite(): ?int
    {
        return $this->electricite;
    }

    public function setElectricite(?int $electricite): self
    {
        $this->electricite = $electricite;

        return $this;
    }

    public function getCuisine(): ?bool
    {
        return $this->cuisine;
    }

    public function setCuisine(?bool $cuisine): self
    {
        $this->cuisine = $cuisine;

        return $this;
    }

    public function getCuisineSurface(): ?int
    {
        return $this->cuisineSurface;
    }

    public function setCuisineSurface(?int $cuisineSurface): self
    {
        $this->cuisineSurface = $cuisineSurface;

        return $this;
    }

    public function getChambre1(): ?bool
    {
        return $this->chambre1;
    }

    public function setChambre1(bool $chambre1): self
    {
        $this->chambre1 = $chambre1;

        return $this;
    }

    public function getChambre1Surface(): ?int
    {
        return $this->chambre1Surface;
    }

    public function setChambre1Surface(?int $chambre1Surface): self
    {
        $this->chambre1Surface = $chambre1Surface;

        return $this;
    }

    public function getChambre2(): ?bool
    {
        return $this->chambre2;
    }

    public function setChambre2(?bool $chambre2): self
    {
        $this->chambre2 = $chambre2;

        return $this;
    }

    public function getChambre2Surface(): ?int
    {
        return $this->chambre2Surface;
    }

    public function setChambre2Surface(?int $chambre2Surface): self
    {
        $this->chambre2Surface = $chambre2Surface;

        return $this;
    }

    public function getChambre3(): ?bool
    {
        return $this->chambre3;
    }

    public function setChambre3(?bool $chambre3): self
    {
        $this->chambre3 = $chambre3;

        return $this;
    }

    public function getChambre3Surface(): ?int
    {
        return $this->chambre3Surface;
    }

    public function setChambre3Surface(?int $chambre3Surface): self
    {
        $this->chambre3Surface = $chambre3Surface;

        return $this;
    }

    public function getSalon(): ?bool
    {
        return $this->salon;
    }

    public function setSalon(?bool $salon): self
    {
        $this->salon = $salon;

        return $this;
    }

    public function getSalonSurface(): ?int
    {
        return $this->salonSurface;
    }

    public function setSalonSurface(?int $salonSurface): self
    {
        $this->salonSurface = $salonSurface;

        return $this;
    }

    public function getBalconSurface(): ?int
    {
        return $this->balconSurface;
    }

    public function setBalconSurface(?int $balconSurface): self
    {
        $this->balconSurface = $balconSurface;

        return $this;
    }

    public function getGarageSurface(): ?int
    {
        return $this->garageSurface;
    }

    public function setGarageSurface(?int $garageSurface): self
    {
        $this->garageSurface = $garageSurface;

        return $this;
    }

    public function getGaz(): ?string
    {
        return $this->gaz;
    }

    public function setGaz(?string $gaz): self
    {
        $this->gaz = $gaz;

        return $this;
    }

    public function getCategorieAnnonce(): ?string
    {
        return $this->categorieAnnonce;
    }

    public function setCategorieAnnonce(?string $categorieAnnonce): self
    {
        $this->categorieAnnonce = $categorieAnnonce;

        return $this;
    }

    public function getDisponibilite(): ?string
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(?string $disponibilite): self
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }

    public function getNombrePiece(): ?int
    {
        return $this->nombrePiece;
    }

    public function setNombrePiece(?int $nombrePiece): self
    {
        $this->nombrePiece = $nombrePiece;

        return $this;
    }

    public function getEntree(): ?bool
    {
        return $this->entree;
    }

    public function setEntree(?bool $entree): self
    {
        $this->entree = $entree;

        return $this;
    }

    public function getEntreeSurface(): ?int
    {
        return $this->entreeSurface;
    }

    public function setEntreeSurface(?int $entreeSurface): self
    {
        $this->entreeSurface = $entreeSurface;

        return $this;
    }

    public function getElctriciteValeur(): ?int
    {
        return $this->elctriciteValeur;
    }

    public function setElctriciteValeur(?int $elctriciteValeur): self
    {
        $this->elctriciteValeur = $elctriciteValeur;

        return $this;
    }

    public function getGazValeur(): ?int
    {
        return $this->gazValeur;
    }

    public function setGazValeur(?int $gazValeur): self
    {
        $this->gazValeur = $gazValeur;

        return $this;
    }

    public function getTaxeFonciere(): ?int
    {
        return $this->taxeFonciere;
    }

    public function setTaxeFonciere(?int $taxeFonciere): self
    {
        $this->taxeFonciere = $taxeFonciere;

        return $this;
    }

    public function getTaxeHabitation(): ?int
    {
        return $this->taxeHabitation;
    }

    public function setTaxeHabitation(?int $taxeHabitation): self
    {
        $this->taxeHabitation = $taxeHabitation;

        return $this;
    }





}


