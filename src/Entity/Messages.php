<?php

namespace App\Entity;

use App\Repository\MessagesRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MessagesRepository::class)
 * @ApiResource()
 */
class Messages
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
    private $content;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createAt;

    /**
     * @ORM\ManyToOne(targetEntity=Conversations::class, inversedBy="messages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $conversations_idConversations;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

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

    public function getConversationsIdConversations(): ?Conversations
    {
        return $this->conversations_idConversations;
    }

    public function setConversationsIdConversations(?Conversations $conversations_idConversations): self
    {
        $this->conversations_idConversations = $conversations_idConversations;

        return $this;
    }

}
