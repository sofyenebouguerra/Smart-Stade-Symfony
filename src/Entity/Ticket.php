<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ticket
 *
 * @ORM\Table(name="ticket")
 * @ORM\Entity
 */
class Ticket
{
    /**
     * @var string
     *@Assert\NotBlank
     * @ORM\Column(name="num_ticket", type="string", length=20, nullable=false)
     * @ORM\Id
     */
    private $numTicket;

    /**
     * @var string
     *@Assert\NotBlank
     * @ORM\Column(name="ref_match", type="string", length=20, nullable=false)
     */
    private $refMatch;

    /**
     * @var string
     *@Assert\NotBlank
     * @ORM\Column(name="num_place", type="string", length=20, nullable=false)
     */
    private $numPlace;

    /**
     * @var string
     *@Assert\NotBlank
     * @ORM\Column(name="disp", type="string", length=10, nullable=false)
     */
    private $disp;



    public function setNumTicket(string $numTicket): self
    {
        $this->numTicket = $numTicket;

        return $this;
    }
    public function getNumTicket(): ?string
    {
        return $this->numTicket;
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

    public function getNumPlace(): ?string
    {
        return $this->numPlace;
    }

    public function setNumPlace(string $numPlace): self
    {
        $this->numPlace = $numPlace;

        return $this;
    }

    public function getDisp(): ?string
    {
        return $this->disp;
    }

    public function setDisp(string $disp): self
    {
        $this->disp = $disp;

        return $this;
    }


}
