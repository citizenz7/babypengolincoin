<?php

namespace App\Entity;

use App\Repository\SettingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SettingRepository::class)]
class Setting
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $siteName = null;

    #[ORM\Column(length: 255)]
    private ?string $siteNamefull = null;

    #[ORM\Column(length: 255)]
    private ?string $siteNameticker = null;

    #[ORM\Column(length: 255)]
    private ?string $siteUrl = null;

    #[ORM\Column(length: 255)]
    private ?string $siteUrlfull = null;

    #[ORM\Column(length: 255)]
    private ?string $siteEmail = null;

    #[ORM\Column(length: 255)]
    private ?string $siteLogo = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $siteDescription = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $siteKeywords = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $siteAbout = null;

    #[ORM\Column(length: 255)]
    private ?string $siteVersion = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $siteDisclaimer = null;

    #[ORM\Column(length: 255)]
    private ?string $siteFooterlefttitle = null;

    #[ORM\Column(length: 255)]
    private ?string $siteFootercentertitle = null;

    #[ORM\Column(length: 255)]
    private ?string $siteFooterrighttitle = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $siteFooterrightcontent = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSiteName(): ?string
    {
        return $this->siteName;
    }

    public function setSiteName(string $siteName): self
    {
        $this->siteName = $siteName;

        return $this;
    }

    public function getSiteNamefull(): ?string
    {
        return $this->siteNamefull;
    }

    public function setSiteNamefull(string $siteNamefull): self
    {
        $this->siteNamefull = $siteNamefull;

        return $this;
    }

    public function getSiteNameticker(): ?string
    {
        return $this->siteNameticker;
    }

    public function setSiteNameticker(string $siteNameticker): self
    {
        $this->siteNameticker = $siteNameticker;

        return $this;
    }

    public function getSiteUrl(): ?string
    {
        return $this->siteUrl;
    }

    public function setSiteUrl(string $siteUrl): self
    {
        $this->siteUrl = $siteUrl;

        return $this;
    }

    public function getSiteUrlfull(): ?string
    {
        return $this->siteUrlfull;
    }

    public function setSiteUrlfull(string $siteUrlfull): self
    {
        $this->siteUrlfull = $siteUrlfull;

        return $this;
    }

    public function getSiteEmail(): ?string
    {
        return $this->siteEmail;
    }

    public function setSiteEmail(string $siteEmail): self
    {
        $this->siteEmail = $siteEmail;

        return $this;
    }

    public function getSiteLogo(): ?string
    {
        return $this->siteLogo;
    }

    public function setSiteLogo(string $siteLogo): self
    {
        $this->siteLogo = $siteLogo;

        return $this;
    }

    public function getSiteDescription(): ?string
    {
        return $this->siteDescription;
    }

    public function setSiteDescription(string $siteDescription): self
    {
        $this->siteDescription = $siteDescription;

        return $this;
    }

    public function getSiteKeywords(): ?string
    {
        return $this->siteKeywords;
    }

    public function setSiteKeywords(string $siteKeywords): self
    {
        $this->siteKeywords = $siteKeywords;

        return $this;
    }

    public function getSiteAbout(): ?string
    {
        return $this->siteAbout;
    }

    public function setSiteAbout(string $siteAbout): self
    {
        $this->siteAbout = $siteAbout;

        return $this;
    }

    public function getSiteVersion(): ?string
    {
        return $this->siteVersion;
    }

    public function setSiteVersion(string $siteVersion): self
    {
        $this->siteVersion = $siteVersion;

        return $this;
    }

    public function getSiteDisclaimer(): ?string
    {
        return $this->siteDisclaimer;
    }

    public function setSiteDisclaimer(string $siteDisclaimer): self
    {
        $this->siteDisclaimer = $siteDisclaimer;

        return $this;
    }

    public function getSiteFooterlefttitle(): ?string
    {
        return $this->siteFooterlefttitle;
    }

    public function setSiteFooterlefttitle(string $siteFooterlefttitle): self
    {
        $this->siteFooterlefttitle = $siteFooterlefttitle;

        return $this;
    }

    public function getSiteFootercentertitle(): ?string
    {
        return $this->siteFootercentertitle;
    }

    public function setSiteFootercentertitle(string $siteFootercentertitle): self
    {
        $this->siteFootercentertitle = $siteFootercentertitle;

        return $this;
    }

    public function getSiteFooterrighttitle(): ?string
    {
        return $this->siteFooterrighttitle;
    }

    public function setSiteFooterrighttitle(string $siteFooterrighttitle): self
    {
        $this->siteFooterrighttitle = $siteFooterrighttitle;

        return $this;
    }

    public function getSiteFooterrightcontent(): ?string
    {
        return $this->siteFooterrightcontent;
    }

    public function setSiteFooterrightcontent(string $siteFooterrightcontent): self
    {
        $this->siteFooterrightcontent = $siteFooterrightcontent;

        return $this;
    }

    public function __toString()
    {
        return $this->getSiteName();
    }
}
