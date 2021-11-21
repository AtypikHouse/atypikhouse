<?php

namespace App\Entity;

use App\Repository\BiensDynamicPropertyRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass=BiensDynamicPropertyRepository::class)
 * @ApiResource()
 */
class BiensDynamicProperty
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
     * @ORM\ManyToOne(targetEntity=Properties::class, inversedBy="biensDynamicProperties")
     */
    private $bien_idProperties;

    /**
     * @ORM\ManyToOne(targetEntity=DynamicProperty::class, inversedBy="biensDynamicProperties")
     */
    private $dynamicProperty_idDynamicProperty;

    

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

    public function getBienIdProperties(): ?Properties
    {
        return $this->bien_idProperties;
    }

    public function setBienIdProperties(?Properties $bien_idProperties): self
    {
        $this->bien_idProperties = $bien_idProperties;

        return $this;
    }

    public function getDynamicPropertyIdDynamicProperty(): ?DynamicProperty
    {
        return $this->dynamicProperty_idDynamicProperty;
    }

    public function setDynamicPropertyIdDynamicProperty(?DynamicProperty $dynamicProperty_idDynamicProperty): self
    {
        $this->dynamicProperty_idDynamicProperty = $dynamicProperty_idDynamicProperty;

        return $this;
    }

}
