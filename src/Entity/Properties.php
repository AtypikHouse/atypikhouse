<?php

namespace App\Entity;

use App\Repository\PropertiesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PropertiesRepository::class)
 */
class Properties
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
     * @ORM\Column(type="datetime_immutable")
     */
    private $createAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $rooms;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $surface;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $location;

    /**
     * @ORM\Column(type="integer")
     */
    private $hostingCapacity;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $checkIntAt;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $checkOutAt;

    /**
     * @ORM\Column(type="float")
     */
    private $rate;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $reviews;

    /**
     * @ORM\OneToMany(targetEntity=Reservations::class, mappedBy="Properties_idProperties")
     */
    private $reservations;

    /**
     * @ORM\OneToMany(targetEntity=Pictures::class, mappedBy="bien_idProperties")
     */
    private $pictures;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="properties")
     */
    private $owner_idUser;

    /**
     * @ORM\ManyToOne(targetEntity=PropertyType::class, inversedBy="properties")
     */
    private $propertyType_idPropertyType;

    /**
     * @ORM\OneToOne(targetEntity=Adress::class, cascade={"persist", "remove"})
     */
    private $adress_idAdress;

    /**
     * @ORM\OneToMany(targetEntity=Conversations::class, mappedBy="biens_idProperties")
     */
    private $conversations;

    /**
     * @ORM\OneToMany(targetEntity=PropertiesEquipements::class, mappedBy="biens_idProperties")
     */
    private $propertiesEquipements;

    /**
     * @ORM\OneToMany(targetEntity=Planning::class, mappedBy="properties_idProperties")
     */
    private $plannings;

    /**
     * @ORM\OneToMany(targetEntity=BiensDynamicProperty::class, mappedBy="bien_idProperties")
     */
    private $biensDynamicProperties;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->pictures = new ArrayCollection();
        $this->conversations = new ArrayCollection();
        $this->propertiesEquipements = new ArrayCollection();
        $this->plannings = new ArrayCollection();
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

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeImmutable $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }

    public function getRooms(): ?int
    {
        return $this->rooms;
    }

    public function setRooms(int $rooms): self
    {
        $this->rooms = $rooms;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSurface(): ?float
    {
        return $this->surface;
    }

    public function setSurface(float $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getHostingCapacity(): ?int
    {
        return $this->hostingCapacity;
    }

    public function setHostingCapacity(int $hostingCapacity): self
    {
        $this->hostingCapacity = $hostingCapacity;

        return $this;
    }

    public function getCheckIntAt(): ?\DateTimeImmutable
    {
        return $this->checkIntAt;
    }

    public function setCheckIntAt(\DateTimeImmutable $checkIntAt): self
    {
        $this->checkIntAt = $checkIntAt;

        return $this;
    }

    public function getCheckOutAt(): ?\DateTimeImmutable
    {
        return $this->checkOutAt;
    }

    public function setCheckOutAt(\DateTimeImmutable $checkOutAt): self
    {
        $this->checkOutAt = $checkOutAt;

        return $this;
    }

    public function getRate(): ?float
    {
        return $this->rate;
    }

    public function setRate(float $rate): self
    {
        $this->rate = $rate;

        return $this;
    }

    public function getReviews(): ?int
    {
        return $this->reviews;
    }

    public function setReviews(?int $reviews): self
    {
        $this->reviews = $reviews;

        return $this;
    }

    /**
     * @return Collection|Reservations[]
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservations $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setPropertiesIdProperties($this);
        }

        return $this;
    }

    public function removeReservation(Reservations $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getPropertiesIdProperties() === $this) {
                $reservation->setPropertiesIdProperties(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Pictures[]
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(Pictures $picture): self
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures[] = $picture;
            $picture->setBienIdProperties($this);
        }

        return $this;
    }

    public function removePicture(Pictures $picture): self
    {
        if ($this->pictures->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getBienIdProperties() === $this) {
                $picture->setBienIdProperties(null);
            }
        }

        return $this;
    }

    public function getOwnerIdUser(): ?User
    {
        return $this->owner_idUser;
    }

    public function setOwnerIdUser(?User $owner_idUser): self
    {
        $this->owner_idUser = $owner_idUser;

        return $this;
    }

    public function getPropertyTypeIdPropertyType(): ?PropertyType
    {
        return $this->propertyType_idPropertyType;
    }

    public function setPropertyTypeIdPropertyType(?PropertyType $propertyType_idPropertyType): self
    {
        $this->propertyType_idPropertyType = $propertyType_idPropertyType;

        return $this;
    }

    public function getAdressIdAdress(): ?Adress
    {
        return $this->adress_idAdress;
    }

    public function setAdressIdAdress(?Adress $adress_idAdress): self
    {
        $this->adress_idAdress = $adress_idAdress;

        return $this;
    }

    /**
     * @return Collection|Conversations[]
     */
    public function getConversations(): Collection
    {
        return $this->conversations;
    }

    public function addConversation(Conversations $conversation): self
    {
        if (!$this->conversations->contains($conversation)) {
            $this->conversations[] = $conversation;
            $conversation->setBiensIdProperties($this);
        }

        return $this;
    }

    public function removeConversation(Conversations $conversation): self
    {
        if ($this->conversations->removeElement($conversation)) {
            // set the owning side to null (unless already changed)
            if ($conversation->getBiensIdProperties() === $this) {
                $conversation->setBiensIdProperties(null);
            }
        }

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
            $propertiesEquipement->setBiensIdProperties($this);
        }

        return $this;
    }

    public function removePropertiesEquipement(PropertiesEquipements $propertiesEquipement): self
    {
        if ($this->propertiesEquipements->removeElement($propertiesEquipement)) {
            // set the owning side to null (unless already changed)
            if ($propertiesEquipement->getBiensIdProperties() === $this) {
                $propertiesEquipement->setBiensIdProperties(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Planning[]
     */
    public function getPlannings(): Collection
    {
        return $this->plannings;
    }

    public function addPlanning(Planning $planning): self
    {
        if (!$this->plannings->contains($planning)) {
            $this->plannings[] = $planning;
            $planning->setPropertiesIdProperties($this);
        }

        return $this;
    }

    public function removePlanning(Planning $planning): self
    {
        if ($this->plannings->removeElement($planning)) {
            // set the owning side to null (unless already changed)
            if ($planning->getPropertiesIdProperties() === $this) {
                $planning->setPropertiesIdProperties(null);
            }
        }

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
            $biensDynamicProperty->setBienIdProperties($this);
        }

        return $this;
    }

    public function removeBiensDynamicProperty(BiensDynamicProperty $biensDynamicProperty): self
    {
        if ($this->biensDynamicProperties->removeElement($biensDynamicProperty)) {
            // set the owning side to null (unless already changed)
            if ($biensDynamicProperty->getBienIdProperties() === $this) {
                $biensDynamicProperty->setBienIdProperties(null);
            }
        }

        return $this;
    }
}
