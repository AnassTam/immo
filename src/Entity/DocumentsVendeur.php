<?php

namespace App\Entity;

use App\Repository\DocumentsVendeurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DocumentsVendeurRepository::class)
 */
class DocumentsVendeur
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
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=RealEstate::class, inversedBy="documentsVendeurs")
     */
    private $realEstate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getRealEstate(): ?RealEstate
    {
        return $this->realEstate;
    }

    public function setRealEstate(?RealEstate $realEstate): self
    {
        $this->realEstate = $realEstate;

        return $this;
    }
}
