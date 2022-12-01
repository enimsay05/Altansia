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


}
