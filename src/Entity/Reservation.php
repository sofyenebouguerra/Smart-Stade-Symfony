<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity
 */
class Reservation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_reservation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idReservation;

    /**
     * @var int
     * @Assert\NotBlank
     *
     * @ORM\Column(name="cin_client", type="integer", nullable=false)
     */
    private $cinClient;

    /**
     * @var string
     * @Assert\NotBlank
     *
     * @ORM\Column(name="ref_match", type="string", length=20, nullable=false)
     */
    private $refMatch;

    /**
     * @var string
     *@Assert\NotBlank
     * @ORM\Column(name="num_ticket", type="string", length=20, nullable=false)
     */
    private $numTicket;

    /**
     * @var \DateTime
     *@Assert\NotBlank
     * @ORM\Column(name="date_reservation", type="date", nullable=false)
     */
    private $dateReservation;

    public function getIdReservation(): ?int
    {
        return $this->idReservation;
    }

    public function getCinClient(): ?int
    {
        return $this->cinClient;
    }

    public function setCinClient(int $cinClient): self
    {
        $this->cinClient = $cinClient;

        return $this;
    }

    public function getRefMatch(): ?string
    {
        return $this->refMatch;
    }

    public function setRefMatch(string $refMatch): self
    {
        $this->refMatch = $refMatch;

        return $this;
    }

    public function getNumTicket(): ?string
    {
        return $this->numTicket;
    }

    public function setNumTicket(string $numTicket): self
    {
        $this->numTicket = $numTicket;

        return $this;
    }

    public function getDateReservation(): ?\DateTimeInterface
    {
        return $this->dateReservation;
    }

    public function setDateReservation(\DateTimeInterface $dateReservation): self
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }


}
