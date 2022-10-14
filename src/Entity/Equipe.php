<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Equipe
 *
 * @ORM\Table(name="equipe")
 * @ORM\Entity
 */
class Equipe
{
    /**
     * @var int
     *
     * @ORM\Column(name="idequipe", type="integer", nullable=false)
     * @ORM\Id
     */
    private $idequipe;

    /**
     * @var int
     * @Assert\NotBlank
     *
     * @ORM\Column(name="nomequipe", type="integer", nullable=false)
     */
    private $nomequipe;

    /**
     * @var int
     * @Assert\NotBlank
     *
     * @ORM\Column(name="nbreffectif", type="integer", nullable=false)
     */
    private $nbreffectif;

    /**
     * @var string
     * @Assert\NotBlank
     *
     * @ORM\Column(name="nompresidentequipe", type="string", length=30, nullable=false)
     */
    private $nompresidentequipe;

    /**
     * @var string
     *@Assert\NotBlank
     * @ORM\Column(name="nomentrqineurequipe", type="string", length=30, nullable=false)
     */
    private $nomentrqineurequipe;

    /**
     * @var string
     * @Assert\NotBlank
     *
     * @ORM\Column(name="nomcapitaineesuipe", type="string", length=30, nullable=false)
     */
    private $nomcapitaineesuipe;

    public function getIdequipe(): ?int
    {
        return $this->idequipe;
    }

    public function getNomequipe(): ?int
    {
        return $this->nomequipe;
    }

    public function setNomequipe(int $nomequipe): self
    {
        $this->nomequipe = $nomequipe;

        return $this;
    }

    public function getNbreffectif(): ?int
    {
        return $this->nbreffectif;
    }

    public function setNbreffectif(int $nbreffectif): self
    {
        $this->nbreffectif = $nbreffectif;

        return $this;
    }

    public function getNompresidentequipe(): ?string
    {
        return $this->nompresidentequipe;
    }

    public function setNompresidentequipe(string $nompresidentequipe): self
    {
        $this->nompresidentequipe = $nompresidentequipe;

        return $this;
    }

    public function getNomentrqineurequipe(): ?string
    {
        return $this->nomentrqineurequipe;
    }

    public function setNomentrqineurequipe(string $nomentrqineurequipe): self
    {
        $this->nomentrqineurequipe = $nomentrqineurequipe;

        return $this;
    }

    public function getNomcapitaineesuipe(): ?string
    {
        return $this->nomcapitaineesuipe;
    }

    public function setNomcapitaineesuipe(string $nomcapitaineesuipe): self
    {
        $this->nomcapitaineesuipe = $nomcapitaineesuipe;

        return $this;
    }


}
