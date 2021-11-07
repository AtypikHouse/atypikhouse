<?php

namespace App\Entity;

use App\Repository\CommentsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentsRepository::class)
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

    public function setReservationsIdReservations(?Reservations $reservations_idReservations): self
    {
        $this->reservations_idReservations = $reservations_idReservations;

        return $this;
    }
}
