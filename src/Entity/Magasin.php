<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Magasin
 *
 * @ORM\Table(name="magasin")
 * @ORM\Entity
 */
class Magasin
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
     * @Assert\NotBlank
     *
     * @ORM\Column(name="nommagasin", type="string", length=255, nullable=false)
     */
    private $nommagasin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNommagasin(): ?string
    {
        return $this->nommagasin;
    }

    public function setNommagasin(string $nommagasin): self
    {
        $this->nommagasin = $nommagasin;

        return $this;
    }


}
