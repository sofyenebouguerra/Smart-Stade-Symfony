<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * MatchFoot
 *
 * @ORM\Table(name="match_foot")
 * @ORM\Entity
 */
class MatchFoot
{
    /**
     * @var string
     *
     * @ORM\Column(name="ref_match", type="string", length=20, nullable=false)
     * @ORM\Id

     */
    private $refMatch;

    /**
     * @var string
     * @Assert\NotBlank
     *
     * @ORM\Column(name="date_match", type="string", length=20, nullable=false)
     */
    private $dateMatch;

    /**
     * @var string
     * @Assert\NotBlank
     *
     * @ORM\Column(name="nom_stade", type="string", length=20, nullable=false)
     */
    private $nomStade;

    /**
     * @var int
     *@Assert\NotBlank
     * @ORM\Column(name="nbr_spectateur", type="integer", nullable=false)
     */
    private $nbrSpectateur;

    public function getRefMatch(): ?string
    {
        return $this->refMatch;
    }

    /**
     * @param string $refMatch
     */
    public function setRefMatch(string $refMatch): void
    {
        $this->refMatch = $refMatch;
    }


    public function getDateMatch(): ?string
    {
        return $this->dateMatch;
    }

    public function setDateMatch(string $dateMatch): self
    {
        $this->dateMatch = $dateMatch;

        return $this;
    }

    public function getNomStade(): ?string
    {
        return $this->nomStade;
    }

    public function setNomStade(string $nomStade): self
    {
        $this->nomStade = $nomStade;

        return $this;
    }

    public function getNbrSpectateur(): ?int
    {
        return $this->nbrSpectateur;
    }

    public function setNbrSpectateur(int $nbrSpectateur): self
    {
        $this->nbrSpectateur = $nbrSpectateur;

        return $this;
    }


}
