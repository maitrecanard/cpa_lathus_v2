<?php

namespace App\Entity;

use App\Repository\ScreenContentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScreenContentRepository::class)]
class ScreenContent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 90)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $value1 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $value2 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $value3 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $value4 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $value5 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $value6 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $value7 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $value8 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $value9 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $value10 = null;

    #[ORM\ManyToOne(inversedBy: 'screenContents')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ScreenParam $screenParam = null;

    #[ORM\OneToMany(mappedBy: 'screenContent', targetEntity: ScreenMovement::class)]
    private Collection $screenMovements;

    public function __construct()
    {
        $this->screenMovements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
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

    public function getValue1(): ?string
    {
        return $this->value1;
    }

    public function setValue1(string $value1): self
    {
        $this->value1 = $value1;

        return $this;
    }

    public function getValue2(): ?string
    {
        return $this->value2;
    }

    public function setValue2(?string $value2): self
    {
        $this->value2 = $value2;

        return $this;
    }

    public function getValue3(): ?string
    {
        return $this->value3;
    }

    public function setValue3(?string $value3): self
    {
        $this->value3 = $value3;

        return $this;
    }

    public function getValue4(): ?string
    {
        return $this->value4;
    }

    public function setValue4(?string $value4): self
    {
        $this->value4 = $value4;

        return $this;
    }

    public function getValue5(): ?string
    {
        return $this->value5;
    }

    public function setValue5(?string $value5): self
    {
        $this->value5 = $value5;

        return $this;
    }

    public function getValue6(): ?string
    {
        return $this->value6;
    }

    public function setValue6(?string $value6): self
    {
        $this->value6 = $value6;

        return $this;
    }

    public function getValue7(): ?string
    {
        return $this->value7;
    }

    public function setValue7(?string $value7): self
    {
        $this->value7 = $value7;

        return $this;
    }

    public function getValue8(): ?string
    {
        return $this->value8;
    }

    public function setValue8(?string $value8): self
    {
        $this->value8 = $value8;

        return $this;
    }

    public function getValue9(): ?string
    {
        return $this->value9;
    }

    public function setValue9(?string $value9): self
    {
        $this->value9 = $value9;

        return $this;
    }

    public function getValue10(): ?string
    {
        return $this->value10;
    }

    public function setValue10(?string $value10): self
    {
        $this->value10 = $value10;

        return $this;
    }

    public function getScreenParam(): ?ScreenParam
    {
        return $this->screenParam;
    }

    public function setScreenParam(?ScreenParam $screenParam): self
    {
        $this->screenParam = $screenParam;

        return $this;
    }

    /**
     * @return Collection<int, ScreenMovement>
     */
    public function getScreenMovements(): Collection
    {
        return $this->screenMovements;
    }

    public function addScreenMovement(ScreenMovement $screenMovement): self
    {
        if (!$this->screenMovements->contains($screenMovement)) {
            $this->screenMovements->add($screenMovement);
            $screenMovement->setScreenContent($this);
        }

        return $this;
    }

    public function removeScreenMovement(ScreenMovement $screenMovement): self
    {
        if ($this->screenMovements->removeElement($screenMovement)) {
            // set the owning side to null (unless already changed)
            if ($screenMovement->getScreenContent() === $this) {
                $screenMovement->setScreenContent(null);
            }
        }

        return $this;
    }
}
