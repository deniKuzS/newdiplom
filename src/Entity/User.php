<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
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
    private $FName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $IName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $OName;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $ChangeFIO;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Number;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Series;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $RegisterNumber;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $DateGive;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $DateCommissions;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $CollorDiplom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NumberProtocol;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $DateProtocol;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NumberBook;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NumberApp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NameSpecialization;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ViewLearning;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $TypeDiplom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NameFaculty;

    /**
     * @ORM\ManyToOne(targetEntity=ResponsiblePersons::class, inversedBy="users")
     */
    private $responsiblePersons;

    /**
     * @ORM\ManyToOne(targetEntity=Groups::class, inversedBy="groupId")
     */
    private $group;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFName(): ?string
    {
        return $this->FName;
    }

    public function setFName(string $FName): self
    {
        $this->FName = $FName;

        return $this;
    }

    public function getIName(): ?string
    {
        return $this->IName;
    }

    public function setIName(string $IName): self
    {
        $this->IName = $IName;

        return $this;
    }

    public function getOName(): ?string
    {
        return $this->OName;
    }

    public function setOName(string $OName): self
    {
        $this->OName = $OName;

        return $this;
    }

    public function getChangeFIO(): ?\DateTimeInterface
    {
        return $this->ChangeFIO;
    }

    public function setChangeFIO(?\DateTimeInterface $ChangeFIO): self
    {
        $this->ChangeFIO = $ChangeFIO;

        return $this;
    }


    public function getNumber(): ?string
    {
        return $this->Number;
    }

    public function setNumber(?string $Number): self
    {
        $this->Number = $Number;

        return $this;
    }

    public function getSeries(): ?string
    {
        return $this->Series;
    }

    public function setSeries(?string $Series): self
    {
        $this->Series = $Series;

        return $this;
    }

    public function getRegisterNumber(): ?string
    {
        return $this->RegisterNumber;
    }

    public function setRegisterNumber(?string $RegisterNumber): self
    {
        $this->RegisterNumber = $RegisterNumber;

        return $this;
    }

    public function getDateGive(): ?\DateTimeInterface
    {
        return $this->DateGive;
    }

    public function setDateGive(?\DateTimeInterface $DateGive): self
    {
        $this->DateGive = $DateGive;

        return $this;
    }

    public function getDateCommissions(): ?\DateTimeInterface
    {
        return $this->DateCommissions;
    }

    public function setDateCommissions(?\DateTimeInterface $DateCommissions): self
    {
        $this->DateCommissions = $DateCommissions;

        return $this;
    }

    public function getCollorDiplom(): ?int
    {
        return $this->CollorDiplom;
    }

    public function setCollorDiplom(?int $CollorDiplom): self
    {
        $this->CollorDiplom = $CollorDiplom;

        return $this;
    }

    public function getNumberProtocol(): ?string
    {
        return $this->NumberProtocol;
    }

    public function setNumberProtocol(?string $NumberProtocol): self
    {
        $this->NumberProtocol = $NumberProtocol;

        return $this;
    }

    public function getDateProtocol(): ?\DateTimeInterface
    {
        return $this->DateProtocol;
    }

    public function setDateProtocol(?\DateTimeInterface $DateProtocol): self
    {
        $this->DateProtocol = $DateProtocol;

        return $this;
    }

    public function getNumberBook(): ?string
    {
        return $this->NumberBook;
    }

    public function setNumberBook(?string $NumberBook): self
    {
        $this->NumberBook = $NumberBook;

        return $this;
    }

    public function getNumberApp(): ?string
    {
        return $this->NumberApp;
    }

    public function setNumberApp(?string $NumberApp): self
    {
        $this->NumberApp = $NumberApp;

        return $this;
    }

    public function getNameSpecialization(): ?string
    {
        return $this->NameSpecialization;
    }

    public function setNameSpecialization(?string $NameSpecialization): self
    {
        $this->NameSpecialization = $NameSpecialization;

        return $this;
    }

    public function getViewLearning(): ?string
    {
        return $this->ViewLearning;
    }

    public function setViewLearning(?string $ViewLearning): self
    {
        $this->ViewLearning = $ViewLearning;

        return $this;
    }

    public function getTypeDiplom(): ?string
    {
        return $this->TypeDiplom;
    }

    public function setTypeDiplom(?string $TypeDiplom): self
    {
        $this->TypeDiplom = $TypeDiplom;

        return $this;
    }

    public function getNameFaculty(): ?string
    {
        return $this->NameFaculty;
    }

    public function setNameFaculty(?string $NameFaculty): self
    {
        $this->NameFaculty = $NameFaculty;

        return $this;
    }

    public function getResponsiblePersons(): ?ResponsiblePersons
    {
        return $this->responsiblePersons;
    }

    public function setResponsiblePersons(?ResponsiblePersons $responsiblePersons): self
    {
        $this->responsiblePersons = $responsiblePersons;

        return $this;
    }

    public function getGroup(): ?Groups
    {
        return $this->group;
    }

    public function setGroup(?Groups $group): self
    {
        $this->group = $group;

        return $this;
    }
}
