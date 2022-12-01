<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuiSommesNous
 *
 * @ORM\Table(name="qui_sommes_nous")
 * @ORM\Entity
 */
class QuiSommesNous
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="section", type="string", length=250, nullable=false)
     */
    private $section;

    /**
     * @var string|null
     *
     * @ORM\Column(name="image", type="string", length=250, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=1000, nullable=false)
     */
    private $text;

    /**
     * @var string|null
     *
     * @ORM\Column(name="titre", type="string", length=250, nullable=true)
     */
    private $titre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="libelle", type="string", length=250, nullable=true)
     */
    private $libelle;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getSection(): string
    {
        return $this->section;
    }

    /**
     * @param string $section
     */
    public function setSection(string $section): void
    {
        $this->section = $section;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     */
    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return string|null
     */
    public function getTitre(): ?string
    {
        return $this->titre;
    }

    /**
     * @param string|null $titre
     */
    public function setTitre(?string $titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return string|null
     */
    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    /**
     * @param string|null $libelle
     */
    public function setLibelle(?string $libelle): void
    {
        $this->libelle = $libelle;
    }
    
}
