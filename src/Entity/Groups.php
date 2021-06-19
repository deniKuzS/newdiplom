<?php

namespace App\Entity;

use App\Repository\GroupsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GroupsRepository::class)
 * @ORM\Table(name="`groups`")
 */
class Groups
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
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="group")
     */
    private $groupId;

    public function __construct()
    {
        $this->groupId = new ArrayCollection();
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

    /**
     * @return Collection|User[]
     */
    public function getGroupId(): Collection
    {
        return $this->groupId;
    }

    public function addGroupId(User $groupId): self
    {
        if (!$this->groupId->contains($groupId)) {
            $this->groupId[] = $groupId;
            $groupId->setGroupId($this);
        }

        return $this;
    }

    public function removeGroupId(User $groupId): self
    {
        if ($this->groupId->removeElement($groupId)) {
            // set the owning side to null (unless already changed)
            if ($groupId->getGroupId() === $this) {
                $groupId->setGroupId(null);
            }
        }

        return $this;
    }
}
