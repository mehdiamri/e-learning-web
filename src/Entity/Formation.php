<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity(repositoryClass="App\Repository\FormationRepository")
 */

class Formation
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     * @Assert\Regex(
     *     pattern     = "/^[a-z]+$/i",
     *     htmlPattern = "^[a-zA-Z]+$",
     *     message="{{ value }} n'est pas un caractere "
     * )
     * @ORM\Column(name="Objet", type="string", length=255, nullable=true)
     */
    private $objet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Type", type="string", length=255, nullable=true)
     * @Assert\Regex(
     *     pattern     = "/^[a-z]+$/i",
     *     htmlPattern = "^[a-zA-Z]+$",
     *     message="{{ value }} n'est pas un caractere "
     * )
     */
    private $type;

    /**
     * @var string|null

     * @ORM\Column(name="Objectif", type="string", length=255, nullable=true)
     */
    private $objectif;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nb_participants", type="integer", nullable=true)
     */
    private $nbParticipants;

    /**
     * @var float|null
     * @Assert\Regex(
     *     pattern     = "/^[0-9]/",
     *     htmlPattern = "^[0-9]",
     *     message="{{ value }} must be a Number"
     * )
     * @ORM\Column(name="cout_hj", type="float", precision=10, scale=0, nullable=true)
     */
    private $coutHj;

    /**
     * @var int|null
     *
     * @ORM\Column(name="nb_jour", type="integer", nullable=true)
     */
    private $nbJour;

    /**
     * @var float|null
     *
     * @ORM\Column(name="cout_fin", type="float", precision=10, scale=0, nullable=true)
     ** @Assert\Regex(
     *     pattern     = "/^[0-9]/",
     *     htmlPattern = "^[0-9]",
     *     message="{{ value }} must be a Number"
     * )
     */
    private $coutFin;

    /**
     * @var \DateTime|null
     * @ORM\Column(name="date_reelle", type="date", nullable=true)
     *  @Assert\Date()
     * @Assert\Expression(
     *     "this.getDatePrevu() > this.getDateReelle()",
     *     message="La date fin ne doit pas être antérieure à la date début"
     * )
     */
    private $dateReelle;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_prevu", type="date", nullable=true)
     */
    private $datePrevu;

    /**
     * @var string|null
     *
     * @ORM\Column(name="path", type="string", length=255, nullable=true)
     */
    private $path;

    /**
     * @var string|null
     *
     * @ORM\Column(name="categorie", type="string", length=255, nullable=true)

     */

    private $categorie;
    /**
     * @var int |null
     *
     * @ORM\Column(name="id_formateur", type="integer", length=255, nullable=true)
     */
    private  $id_formateur;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getIdformateur(): ?int
    {
        return $this->id_formateur;
    }
    public function setidformateur(?int  $id_formateur): self
    {
        $this->id_formateur = $id_formateur;

        return $this;
    }

    public function getObjet(): ?string
    {
        return $this->objet;
    }

    public function setObjet(?string $objet): self
    {
        $this->objet = $objet;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getObjectif(): ?string
    {
        return $this->objectif;
    }

    public function setObjectif(?string $objectif): self
    {
        $this->objectif = $objectif;

        return $this;
    }

    public function getNbParticipants(): ?int
    {
        return $this->nbParticipants;
    }

    public function setNbParticipants(?int $nbParticipants): self
    {
        $this->nbParticipants = $nbParticipants;

        return $this;
    }

    public function getCoutHj(): ?float
    {
        return $this->coutHj;
    }

    public function setCoutHj(?float $coutHj): self
    {
        $this->coutHj = $coutHj;

        return $this;
    }

    public function getNbJour(): ?int
    {
        return $this->nbJour;
    }

    public function setNbJour(?int $nbJour): self
    {
        $this->nbJour = $nbJour;

        return $this;
    }

    public function getCoutFin(): ?float
    {
        return $this->coutFin;
    }

    public function setCoutFin(?float $coutFin): self
    {
        $this->coutFin = $coutFin;

        return $this;
    }

    public function getDateReelle(): ?\DateTimeInterface
    {
        return $this->dateReelle;
    }

    public function setDateReelle(?\DateTimeInterface $dateReelle): self
    {
        $this->dateReelle = $dateReelle;

        return $this;
    }

    public function getDatePrevu(): ?\DateTimeInterface
    {
        return $this->datePrevu;
    }

    public function setDatePrevu(?\DateTimeInterface $datePrevu): self
    {
        $this->datePrevu = $datePrevu;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(?string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }


}
