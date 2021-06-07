<?php

namespace App\Entity;

use App\Repository\TypeTransactionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeTransactionRepository::class)
 */
class TypeTransaction
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
     * @ORM\OneToMany(targetEntity=RealEstate::class, mappedBy="typeTransaction")
     */
    private $realEstate;

    public function __construct()
    {
        $this->realEstate = new ArrayCollection();
    }

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

    /**
     * @return Collection|RealEstate[]
     */
    public function getRealEstate(): Collection
    {
        return $this->realEstate;
    }

    public function addRealEstate(RealEstate $realEstate): self
    {
        if (!$this->realEstate->contains($realEstate)) {
            $this->realEstate[] = $realEstate;
            $realEstate->setTypeTransaction($this);
        }

        return $this;
    }

    public function removeRealEstate(RealEstate $realEstate): self
    {
        if ($this->realEstate->removeElement($realEstate)) {
            // set the owning side to null (unless already changed)
            if ($realEstate->getTypeTransaction() === $this) {
                $realEstate->setTypeTransaction(null);
            }
        }

        return $this;
    }
}
