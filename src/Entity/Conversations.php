<?php

namespace App\Entity;

use App\Repository\ConversationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConversationsRepository::class)
 */
class Conversations
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
    private $conversationsCol;

    /**
     * @ORM\OneToMany(targetEntity=Messages::class, mappedBy="conversations_idConversations")
     */
    private $messages;

    /**
     * @ORM\ManyToOne(targetEntity=Properties::class, inversedBy="conversations")
     */
    private $biens_idProperties;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="conversations")
     */
    private $user_idUser;

    public function __construct()
    {
        $this->messages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConversationsCol(): ?string
    {
        return $this->conversationsCol;
    }

    public function setConversationsCol(string $conversationsCol): self
    {
        $this->conversationsCol = $conversationsCol;

        return $this;
    }

    /**
     * @return Collection|Messages[]
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Messages $message): self
    {
        if (!$this->messages->contains($message)) {
            $this->messages[] = $message;
            $message->setConversationsIdConversations($this);
        }

        return $this;
    }

    public function removeMessage(Messages $message): self
    {
        if ($this->messages->removeElement($message)) {
            // set the owning side to null (unless already changed)
            if ($message->getConversationsIdConversations() === $this) {
                $message->setConversationsIdConversations(null);
            }
        }

        return $this;
    }

    public function getBiensIdProperties(): ?Properties
    {
        return $this->biens_idProperties;
    }

    public function setBiensIdProperties(?Properties $biens_idProperties): self
    {
        $this->biens_idProperties = $biens_idProperties;

        return $this;
    }

    public function getUserIdUser(): ?User
    {
        return $this->user_idUser;
    }

    public function setUserIdUser(?User $user_idUser): self
    {
        $this->user_idUser = $user_idUser;

        return $this;
    }
}
