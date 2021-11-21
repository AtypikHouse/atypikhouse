<?php

namespace App\Entity;

use App\Repository\PropertiesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PropertiesRepository::class)
 * @ApiResource()
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
     * @Assert\Length(
     *  min=2,
     *  minMessage="comment.too_short",
     *  max="150",
     *  maxMessage="comment.too_long"
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createAt;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Length(
     *  min=1,
     *  minMessage="comment.too_short",
     *  max="10",
     *  maxMessage="comment.too_long"
     * )
     */
    private $rooms;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(
     *  min=5,
     *  minMessage="comment.too_short",
     *  max="1000",
     *  maxMessage="comment.too_long"
     * )
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     * @Assert\Length(
     *  min=1,
     *  minMessage="comment.too_short",
     *  max="500",
     *  maxMessage="comment.too_long"
     * )
     */
    private $surface;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *  min=5,
     *  minMessage="comment.too_short",
     *  max="1000",
     *  maxMessage="comment.too_long"
     * )
     */
    /* Name of Country*/ 
    private $location;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Length(
     *  min=1,
     *  minMessage="comment.too_short",
     *  max="10",
     *  maxMessage="comment.too_long"
     * )
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
     * @Assert\Length(
     *  min=1,
     *  minMessage="comment.too_short",
     *  max="5",
     *  maxMessage="comment.too_long"
     * )
     */
    private $rate;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Length(
     *  min=1,
     *  minMessage="comment.too_short",
     *  max="500",
     *  maxMessage="comment.too_long"
     * )
     */
    private $reviews;


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

    

    public function __construct()
    {

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

}
