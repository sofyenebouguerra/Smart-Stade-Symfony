<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * FactureSousTraitance
 *
 * @ORM\Table(name="facture_sous_traitance", indexes={@ORM\Index(name="ID_demande_intervention", columns={"ID_demande_intervention"})})
 * @ORM\Entity
 */
class FactureSousTraitance
{
    /**
     * @var int
     *
     * @ORM\Column(name="code_facture", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeFacture;

    /**
     * @var int
     *@Assert\NotBlank
     * @ORM\Column(name="montant_facture", type="integer", nullable=false)
     */
    private $montantFacture;

    /**
     * @var int
     *@Assert\NotBlank
     * @ORM\Column(name="valeur_main_oeuvre", type="integer", nullable=false)
     */
    private $valeurMainOeuvre;

    /**
     * @var int
     *@Assert\NotBlank
     * @ORM\Column(name="valeur_piece_recharge", type="integer", nullable=false)
     */
    private $valeurPieceRecharge;

    /**
     * @var \DateTime
     * @Assert\NotBlank
     *
     * @ORM\Column(name="date_facture", type="datetime", nullable=false)
     */
    private $dateFacture;

    /**
     * @var \DemandeIntervention
     *
     * @ORM\ManyToOne(targetEntity="DemandeIntervention")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_demande_intervention", referencedColumnName="ID_demande_intervention")
     * })
     */
    private $idDemandeIntervention;

    public function getCodeFacture(): ?int
    {
        return $this->codeFacture;
    }

    public function getMontantFacture(): ?int
    {
        return $this->montantFacture;
    }

    public function setMontantFacture(int $montantFacture): self
    {
        $this->montantFacture = $montantFacture;

        return $this;
    }

    public function getValeurMainOeuvre(): ?int
    {
        return $this->valeurMainOeuvre;
    }

    public function setValeurMainOeuvre(int $valeurMainOeuvre): self
    {
        $this->valeurMainOeuvre = $valeurMainOeuvre;

        return $this;
    }

    public function getValeurPieceRecharge(): ?int
    {
        return $this->valeurPieceRecharge;
    }

    public function setValeurPieceRecharge(int $valeurPieceRecharge): self
    {
        $this->valeurPieceRecharge = $valeurPieceRecharge;

        return $this;
    }

    public function getDateFacture(): ?\DateTimeInterface
    {
        return $this->dateFacture;
    }

    public function setDateFacture(\DateTimeInterface $dateFacture): self
    {
        $this->dateFacture = $dateFacture;

        return $this;
    }

    public function getIdDemandeIntervention(): ?DemandeIntervention
    {
        return $this->idDemandeIntervention;
    }

    public function setIdDemandeIntervention(?DemandeIntervention $idDemandeIntervention): self
    {
        $this->idDemandeIntervention = $idDemandeIntervention;

        return $this;
    }


}
