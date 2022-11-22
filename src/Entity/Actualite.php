<?php

namespace App\Entity;

use App\Repository\ActualiteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActualiteRepository::class)]
class Actualite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 250)]
    private ?string $section = null;

    #[ORM\Column(length: 250, nullable: true)]
    private ?string $text = null;

    #[ORM\Column(length: 250, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(length: 250, nullable: true)]
    private ?string $titre = null;

    #[ORM\Column(length: 250, nullable: true)]
    private ?string $styleImg = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSection(): ?string
    {
        return $this->section;
    }

    public function setSection(string $section): self
    {
        $this->section = $section;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getStyleImg(): ?string
    {
        return $this->styleImg;
    }

    public function setStyleImg(?string $styleImg): self
    {
        $this->styleImg = $styleImg;

        return $this;
    }
}
