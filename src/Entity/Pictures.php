<?php

namespace App\Entity;

use App\Repository\PicturesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PicturesRepository::class)
 */
class Pictures
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
    private $titletitle;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createAt;

    /**
     * @ORM\Column(type="blob")
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity=Properties::class, inversedBy="pictures")
     */
    private $bien_idProperties;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitletitle(): ?string
    {
        return $this->titletitle;
    }

    public function setTitletitle(string $titletitle): self
    {
        $this->titletitle = $titletitle;

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

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        $this->image = $image;

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
}
