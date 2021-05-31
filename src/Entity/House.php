<?php

namespace App\Entity;

use App\Repository\HouseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HouseRepository::class)
 */
class House extends Lebien
{


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $exposition;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $anneeConstruction;



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
}
