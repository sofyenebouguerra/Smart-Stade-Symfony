<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Tournoi
 *
 * @ORM\Table(name="tournoi")
 * @ORM\Entity
 */
class Tournoi
{
    /**
     * @var int
     *
     * @ORM\Column(name="idtournoi", type="integer", nullable=false)
     * @ORM\Id
     */
    private $idtournoi;

    /**
     * @var string
     *@Assert\NotBlank
     * @ORM\Column(name="nomtournoi", type="string", length=30, nullable=false)
     */
    private $nomtournoi;

    /**
     * @var int
     *@Assert\NotBlank
     * @ORM\Column(name="nbrequipes", type="integer", nullable=false)
     */
    private $nbrequipes;

    /**
     * @var \DateTime
     *@Assert\NotBlank
     * @ORM\Column(name="datedebuttournoi", type="date", nullable=false)
     */
    private $datedebuttournoi;

    /**
     * @var \DateTime
     *@Assert\NotBlank
     * @ORM\Column(name="datefintournoi", type="date", nullable=false)
     */
    private $datefintournoi;

    /**
     * @var \DateTime
     *@Assert\NotBlank
     * @ORM\Column(name="heurematchtournoi", type="time", nullable=false)
     */
    private $heurematchtournoi;

    /**
     * @var int
     *@Assert\NotBlank
     * @ORM\Column(name="nbrpoules", type="integer", nullable=false)
     */
    private $nbrpoules;

    public function getIdtournoi(): ?int
    {
        return $this->idtournoi;
    }

    /**
     * @param int $idtournoi
     */
    public function setIdtournoi(int $idtournoi): void
    {
        $this->idtournoi = $idtournoi;
    }


    public function getNomtournoi(): ?string
    {
        return $this->nomtournoi;
    }

    public function setNomtournoi(string $nomtournoi): self
    {
        $this->nomtournoi = $nomtournoi;

        return $this;
    }

    public function getNbrequipes(): ?int
    {
        return $this->nbrequipes;
    }

    public function setNbrequipes(int $nbrequipes): self
    {
        $this->nbrequipes = $nbrequipes;

        return $this;
    }

    public function getDatedebuttournoi(): ?\DateTimeInterface
    {
        return $this->datedebuttournoi;
    }

    public function setDatedebuttournoi(\DateTimeInterface $datedebuttournoi): self
    {
        $this->datedebuttournoi = $datedebuttournoi;

        return $this;
    }

    public function getDatefintournoi(): ?\DateTimeInterface
    {
        return $this->datefintournoi;
    }

    public function setDatefintournoi(\DateTimeInterface $datefintournoi): self
    {
        $this->datefintournoi = $datefintournoi;

        return $this;
    }

    public function getHeurematchtournoi(): ?\DateTimeInterface
    {
        return $this->heurematchtournoi;
    }

    public function setHeurematchtournoi(\DateTimeInterface $heurematchtournoi): self
    {
        $this->heurematchtournoi = $heurematchtournoi;

        return $this;
    }

    public function getNbrpoules(): ?int
    {
        return $this->nbrpoules;
    }

    public function setNbrpoules(int $nbrpoules): self
    {
        $this->nbrpoules = $nbrpoules;

        return $this;
    }


}
