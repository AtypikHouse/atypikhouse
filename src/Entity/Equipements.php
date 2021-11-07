<?php

namespace App\Entity;

use App\Repository\EquipementsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EquipementsRepository::class)
 */
class Equipements
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity=PropertiesEquipements::class, mappedBy="equipements_idEquipements")
     */
    private $propertiesEquipements;

    public function __construct()
    {
        $this->propertiesEquipements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|PropertiesEquipements[]
     */
    public function getPropertiesEquipements(): Collection
    {
        return $this->propertiesEquipements;
    }

    public function addPropertiesEquipement(PropertiesEquipements $propertiesEquipement): self
    {
        if (!$this->propertiesEquipements->contains($propertiesEquipement)) {
            $this->propertiesEquipements[] = $propertiesEquipement;
            $propertiesEquipement->setEquipementsIdEquipements($this);
        }

        return $this;
    }

    public function removePropertiesEquipement(PropertiesEquipements $propertiesEquipement): self
    {
        if ($this->propertiesEquipements->removeElement($propertiesEquipement)) {
            // set the owning side to null (unless already changed)
            if ($propertiesEquipement->getEquipementsIdEquipements() === $this) {
                $propertiesEquipement->setEquipementsIdEquipements(null);
            }
        }

        return $this;
    }
}
