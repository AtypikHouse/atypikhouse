<?php

namespace App\Entity;

use App\Repository\PropertiesEquipementsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PropertiesEquipementsRepository::class)
 */
class PropertiesEquipements
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
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity=Equipements::class, inversedBy="propertiesEquipements")
     */
    private $equipements_idEquipements;

    /**
     * @ORM\ManyToOne(targetEntity=Properties::class, inversedBy="propertiesEquipements")
     */
    private $biens_idProperties;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getEquipementsIdEquipements(): ?Equipements
    {
        return $this->equipements_idEquipements;
    }

    public function setEquipementsIdEquipements(?Equipements $equipements_idEquipements): self
    {
        $this->equipements_idEquipements = $equipements_idEquipements;

        return $this;
    }

    public function getBiensIdProperties(): ?Properties
    {
        return $this->biens_idProperties;
    }

    public function setBiensIdProperties(?Properties $biens_idProperties): self
    {
        $this->biens_idProperties = $biens_idProperties;

        return $this;
    }
}
