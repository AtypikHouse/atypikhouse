<?php

namespace App\Entity;

use App\Repository\PropertyTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=PropertyTypeRepository::class)
 * @ApiResource()
 */
class PropertyType
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     * @Assert\Length(
     *  min=3,
     *  minMessage="comment.too_short",
     *  max="150",
     *  maxMessage="comment.too_long"
     * )
     */
    private $type;

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
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
}
