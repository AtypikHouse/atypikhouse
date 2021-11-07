<?php

namespace App\Entity;

use App\Repository\DynamicPropertyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DynamicPropertyRepository::class)
 */
class DynamicProperty
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
     * @ORM\Column(type="string", length=255)
     */
    private $valueType;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bienType;

    /**
     * @ORM\OneToMany(targetEntity=BiensDynamicProperty::class, mappedBy="dynamicProperty_idDynamicProperty")
     */
    private $biensDynamicProperties;

    public function __construct()
    {
        $this->biensDynamicProperties = new ArrayCollection();
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

    public function getValueType(): ?string
    {
        return $this->valueType;
    }

    public function setValueType(string $valueType): self
    {
        $this->valueType = $valueType;

        return $this;
    }

    public function getBienType(): ?string
    {
        return $this->bienType;
    }

    public function setBienType(string $bienType): self
    {
        $this->bienType = $bienType;

        return $this;
    }

    /**
     * @return Collection|BiensDynamicProperty[]
     */
    public function getBiensDynamicProperties(): Collection
    {
        return $this->biensDynamicProperties;
    }

    public function addBiensDynamicProperty(BiensDynamicProperty $biensDynamicProperty): self
    {
        if (!$this->biensDynamicProperties->contains($biensDynamicProperty)) {
            $this->biensDynamicProperties[] = $biensDynamicProperty;
            $biensDynamicProperty->setDynamicPropertyIdDynamicProperty($this);
        }

        return $this;
    }

    public function removeBiensDynamicProperty(BiensDynamicProperty $biensDynamicProperty): self
    {
        if ($this->biensDynamicProperties->removeElement($biensDynamicProperty)) {
            // set the owning side to null (unless already changed)
            if ($biensDynamicProperty->getDynamicPropertyIdDynamicProperty() === $this) {
                $biensDynamicProperty->setDynamicPropertyIdDynamicProperty(null);
            }
        }

        return $this;
    }
}
