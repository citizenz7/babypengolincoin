<?php

namespace App\Entity;

use App\Repository\SectionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SectionRepository::class)]
class Section
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $subtitle = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $contentMain = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $contentLeft = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $contentRight = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $buttonText = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $buttonLink = null;

    #[ORM\Column]
    private ?int $sortOrder = null;

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

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubtitle(?string $subtitle): self
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function getContentMain(): ?string
    {
        return $this->contentMain;
    }

    public function setContentMain(?string $contentMain): self
    {
        $this->contentMain = $contentMain;

        return $this;
    }

    public function getContentLeft(): ?string
    {
        return $this->contentLeft;
    }

    public function setContentLeft(string $contentLeft): self
    {
        $this->contentLeft = $contentLeft;

        return $this;
    }

    public function getContentRight(): ?string
    {
        return $this->contentRight;
    }

    public function setContentRight(?string $contentRight): self
    {
        $this->contentRight = $contentRight;

        return $this;
    }

    public function getButtonText(): ?string
    {
        return $this->buttonText;
    }

    public function setButtonText(?string $buttonText): self
    {
        $this->buttonText = $buttonText;

        return $this;
    }

    public function getButtonLink(): ?string
    {
        return $this->buttonLink;
    }

    public function setButtonLink(?string $buttonLink): self
    {
        $this->buttonLink = $buttonLink;

        return $this;
    }

    public function getSortOrder(): ?int
    {
        return $this->sortOrder;
    }

    public function setSortOrder(int $sortOrder): self
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }
}
