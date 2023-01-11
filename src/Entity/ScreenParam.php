<?php

namespace App\Entity;

use App\Repository\ScreenParamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ScreenParamRepository::class)]
class ScreenParam
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 90)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 20)]
    #[Groups(['screen_api'])]
    private ?string $image = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['screen_api'])]
    private ?string $setting1 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['screen_api'])]
    private ?string $setting2 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['screen_api'])]
    private ?string $setting3 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['screen_api'])]
    private ?string $setting4 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['screen_api'])]
    private ?string $setting5 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['screen_api'])]
    private ?string $setting6 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['screen_api'])]
    private ?string $setting7 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['screen_api'])]
    private ?string $setting8 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['screen_api'])]
    private ?string $setting9 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['screen_api'])]
    private ?string $setting10 = null;

    #[ORM\Column(nullable: true)]
    private ?int $active = null;

    #[ORM\OneToMany(mappedBy: 'screenParam', targetEntity: ScreenContent::class, orphanRemoval: true)]
    private Collection $screenContents;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $config = null;

    public function __construct()
    {
        $this->screenContents = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getSetting1(): ?string
    {
        return $this->setting1;
    }

    public function setSetting1(?string $setting1): self
    {
        $this->setting1 = $setting1;

        return $this;
    }

    public function getSetting2(): ?string
    {
        return $this->setting2;
    }

    public function setSetting2(?string $setting2): self
    {
        $this->setting2 = $setting2;

        return $this;
    }

    public function getSetting3(): ?string
    {
        return $this->setting3;
    }

    public function setSetting3(?string $setting3): self
    {
        $this->setting3 = $setting3;

        return $this;
    }

    public function getSetting4(): ?string
    {
        return $this->setting4;
    }

    public function setSetting4(?string $setting4): self
    {
        $this->setting4 = $setting4;

        return $this;
    }

    public function getSetting5(): ?string
    {
        return $this->setting5;
    }

    public function setSetting5(?string $setting5): self
    {
        $this->setting5 = $setting5;

        return $this;
    }

    public function getSetting6(): ?string
    {
        return $this->setting6;
    }

    public function setSetting6(?string $setting6): self
    {
        $this->setting6 = $setting6;

        return $this;
    }

    public function getSetting7(): ?string
    {
        return $this->setting7;
    }

    public function setSetting7(?string $setting7): self
    {
        $this->setting7 = $setting7;

        return $this;
    }

    public function getSetting8(): ?string
    {
        return $this->setting8;
    }

    public function setSetting8(?string $setting8): self
    {
        $this->setting8 = $setting8;

        return $this;
    }

    public function getSetting9(): ?string
    {
        return $this->setting9;
    }

    public function setSetting9(?string $setting9): self
    {
        $this->setting9 = $setting9;

        return $this;
    }

    public function getSetting10(): ?string
    {
        return $this->setting10;
    }

    public function setSetting10(?string $setting10): self
    {
        $this->setting10 = $setting10;

        return $this;
    }

    public function getActive(): ?int
    {
        return $this->active;
    }

    public function setActive(?int $active): self
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return Collection<int, ScreenContent>
     */
    public function getScreenContents(): Collection
    {
        return $this->screenContents;
    }

    public function addScreenContent(ScreenContent $screenContent): self
    {
        if (!$this->screenContents->contains($screenContent)) {
            $this->screenContents->add($screenContent);
            $screenContent->setScreenParam($this);
        }

        return $this;
    }

    public function removeScreenContent(ScreenContent $screenContent): self
    {
        if ($this->screenContents->removeElement($screenContent)) {
            // set the owning side to null (unless already changed)
            if ($screenContent->getScreenParam() === $this) {
                $screenContent->setScreenParam(null);
            }
        }

        return $this;
    }

    public function getConfig(): ?string
    {
        return $this->config;
    }

    public function setConfig(string $config): self
    {
        $this->config = $config;

        return $this;
    }
}
