<?php

namespace App\Entity;

use App\Repository\ReservationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationsRepository::class)
 * @ApiResource()
 */
class Reservations
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createAt;

    /**
     * @ORM\Column(type="date")
     */
    private $arrivalDate;

    /**
     * @ORM\Column(type="date")
     */
    private $departureDate;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="float")
     */
    private $taxe;

    /**
     * @ORM\Column(type="float")
     */
    private $totalPrice;

    /**
     * @ORM\Column(type="integer")
     */
    private $insurance;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tenant_idUser;

    /**
     * @ORM\ManyToOne(targetEntity=Properties::class, inversedBy="reservations")
     */
    private $Properties_idProperties;


    public function __construct()
    {

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeImmutable $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }

    public function getArrivalDate(): ?\DateTimeInterface
    {
        return $this->arrivalDate;
    }

    public function setArrivalDate(\DateTimeInterface $arrivalDate): self
    {
        $this->arrivalDate = $arrivalDate;

        return $this;
    }

    public function getDepartureDate(): ?\DateTimeInterface
    {
        return $this->departureDate;
    }

    public function setDepartureDate(\DateTimeInterface $departureDate): self
    {
        $this->departureDate = $departureDate;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getTaxe(): ?float
    {
        return $this->taxe;
    }

    public function setTaxe(float $taxe): self
    {
        $this->taxe = $taxe;

        return $this;
    }

    public function getTotalPrice(): ?float
    {
        return $this->totalPrice;
    }

    public function setTotalPrice(float $totalPrice): self
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    public function getInsurance(): ?int
    {
        return $this->insurance;
    }

    public function setInsurance(int $insurance): self
    {
        $this->insurance = $insurance;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getTenantIdUser(): ?User
    {
        return $this->tenant_idUser;
    }

    public function setTenantIdUser(?User $tenant_idUser): self
    {
        $this->tenant_idUser = $tenant_idUser;

        return $this;
    }

    public function getPropertiesIdProperties(): ?Properties
    {
        return $this->Properties_idProperties;
    }

    public function setPropertiesIdProperties(?Properties $Properties_idProperties): self
    {
        $this->Properties_idProperties = $Properties_idProperties;

        return $this;
    }


}
