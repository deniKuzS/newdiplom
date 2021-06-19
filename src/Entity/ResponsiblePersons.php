<?php

namespace App\Entity;

use App\Repository\ResponsiblePersonsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ResponsiblePersonsRepository::class)
 */
class ResponsiblePersons
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
    private $NameRector;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NameDeputyRector;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NameChairman;


    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="responsiblePersons")
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getNameRector(): ?string
    {
        return $this->NameRector;
    }

    public function setNameRector(string $NameRector): self
    {
        $this->NameRector = $NameRector;

        return $this;
    }

    public function getNameDeputyRector(): ?string
    {
        return $this->NameDeputyRector;
    }

    public function setNameDeputyRector(string $NameDeputyRector): self
    {
        $this->NameDeputyRector = $NameDeputyRector;

        return $this;
    }

    public function getNameChairman(): ?string
    {
        return $this->NameChairman;
    }

    public function setNameChairman(string $NameChairman): self
    {
        $this->NameChairman = $NameChairman;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setResponsiblePersons($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getResponsiblePersons() === $this) {
                $user->setResponsiblePersons(null);
            }
        }

        return $this;
    }
}
