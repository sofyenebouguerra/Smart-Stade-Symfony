<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * DemandeIntervention
 *
 * @ORM\Table(name="demande_intervention")
 * @ORM\Entity
 */
class DemandeIntervention
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID_demande_intervention", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDemandeIntervention;

    /**
     * @var string
     * @Assert\NotBlank
     *
     * @ORM\Column(name="Type_intervention", type="string", length=50, nullable=false)
     */
    private $typeIntervention;

    /**
     * @var string
     * @Assert\NotBlank
     *
     * @ORM\Column(name="Intervention_demandee", type="text", length=65535, nullable=false)
     */
    private $interventionDemandee;

    /**
     * @var \DateTime
     * @Assert\NotBlank
     *
     * @ORM\Column(name="Date_debut_intervention", type="datetime", nullable=false)
     */
    private $dateDebutIntervention;

    /**
     * @var \DateTime
     * @Assert\NotBlank
     *
     * @ORM\Column(name="Date_fin_intervention", type="datetime", nullable=false)
     */
    private $dateFinIntervention;

    /**
     * @var string
     * @Assert\NotBlank
     *
     * @ORM\Column(name="Service_demandeur", type="string", length=255, nullable=false)
     */
    private $serviceDemandeur;

    /**
     * @var int
     *@Assert\NotBlank
     * @ORM\Column(name="Degre_urgence", type="integer", nullable=false)
     */
    private $degreUrgence;

    /**
     * @var string
     *
     *
     * @ORM\Column(name="background_color", type="string", length=7, nullable=false)
     */
    private $backgroundColor;

    /**
     * @var string
     *
     * @ORM\Column(name="border_color", type="string", length=7, nullable=false)
     */
    private $borderColor;

    /**
     * @var string
     *
     * @ORM\Column(name="text_color", type="string", length=7, nullable=false)
     */
    private $textColor;

    /**
     * @var bool
     *
     * @ORM\Column(name="all_day", type="boolean", nullable=false)
     */
    private $allDay;

    public function getIdDemandeIntervention(): ?int
    {
        return $this->idDemandeIntervention;
    }

    public function getTypeIntervention(): ?string
    {
        return $this->typeIntervention;
    }

    public function setTypeIntervention(string $typeIntervention): self
    {
        $this->typeIntervention = $typeIntervention;

        return $this;
    }

    public function getInterventionDemandee(): ?string
    {
        return $this->interventionDemandee;
    }

    public function setInterventionDemandee(string $interventionDemandee): self
    {
        $this->interventionDemandee = $interventionDemandee;

        return $this;
    }

    public function getDateDebutIntervention(): ?\DateTimeInterface
    {
        return $this->dateDebutIntervention;
    }

    public function setDateDebutIntervention(\DateTimeInterface $dateDebutIntervention): self
    {
        $this->dateDebutIntervention = $dateDebutIntervention;

        return $this;
    }

    public function getDateFinIntervention(): ?\DateTimeInterface
    {
        return $this->dateFinIntervention;
    }

    public function setDateFinIntervention(\DateTimeInterface $dateFinIntervention): self
    {
        $this->dateFinIntervention = $dateFinIntervention;

        return $this;
    }

    public function getServiceDemandeur(): ?string
    {
        return $this->serviceDemandeur;
    }

    public function setServiceDemandeur(string $serviceDemandeur): self
    {
        $this->serviceDemandeur = $serviceDemandeur;

        return $this;
    }

    public function getDegreUrgence(): ?int
    {
        return $this->degreUrgence;
    }

    public function setDegreUrgence(int $degreUrgence): self
    {
        $this->degreUrgence = $degreUrgence;

        return $this;
    }

    public function getBackgroundColor(): ?string
    {
        return $this->backgroundColor;
    }

    public function setBackgroundColor(string $backgroundColor): self
    {
        $this->backgroundColor = $backgroundColor;

        return $this;
    }

    public function getBorderColor(): ?string
    {
        return $this->borderColor;
    }

    public function setBorderColor(string $borderColor): self
    {
        $this->borderColor = $borderColor;

        return $this;
    }

    public function getTextColor(): ?string
    {
        return $this->textColor;
    }

    public function setTextColor(string $textColor): self
    {
        $this->textColor = $textColor;

        return $this;
    }

    public function getAllDay(): ?bool
    {
        return $this->allDay;
    }

    public function setAllDay(bool $allDay): self
    {
        $this->allDay = $allDay;

        return $this;
    }


}
