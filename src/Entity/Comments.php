<?php

namespace App\Entity;

use App\Repository\CommentsRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CommentsRepository::class)
 * @ApiResource()
 */
class Comments
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(
     *  min=1,
     *  minMessage="context.too_short",
     *  max="500",
     *  maxMessage="context.too_long"
     * )
     */
    private $context;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createAt;

    /**
     * @ORM\ManyToOne(targetEntity=Reservations::class, inversedBy="comments")
     */
    private $reservations_idReservations;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContext(): ?string
    {
        return $this->context;
    }

    public function setContext(string $context): self
    {
        $this->context = $context;

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

    public function getReservationsIdReservations(): ?Reservations
    {
        return $this->reservations_idReservations;
    }

    public function setReservationsIdReservations(
        ?Reservations $reservations_idReservations
    ): self {
        $this->reservations_idReservations = $reservations_idReservations;

        return $this;
    }
}
