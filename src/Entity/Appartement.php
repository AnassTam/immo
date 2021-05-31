<?php

namespace App\Entity;

use App\Repository\AppartementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AppartementRepository::class)
 */
class Appartement extends Lebien
{


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
}
