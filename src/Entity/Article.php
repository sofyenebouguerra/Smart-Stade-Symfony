<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Article
 *
 * @ORM\Table(name="article", indexes={@ORM\Index(name="fk_id_magasin", columns={"magasin_id"})})
 * @ORM\Entity
 */
class Article
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
     * @var int
     * @Assert\NotBlank
     *
     * @ORM\Column(name="refarticle", type="integer", nullable=false)
     */
    private $refarticle;

    /**
     * @var int
     * @Assert\NotBlank
     *
     * @ORM\Column(name="nomarticle", type="string",length=50, nullable=false)
     */
    private $nomarticle;

    /**
     * @var int
     *@Assert\NotBlank
     * @ORM\Column(name="taille", type="integer", nullable=false)
     */
    private $taille;

    /**
     * @var float
     * @Assert\NotBlank
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var \Magasin
     * @Assert\NotBlank
     *
     * @ORM\ManyToOne(targetEntity="Magasin")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="magasin_id", referencedColumnName="id")
     * })
     */
    private $magasin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefarticle(): ?int
    {
        return $this->refarticle;
    }

    public function setRefarticle(int $refarticle): self
    {
        $this->refarticle = $refarticle;

        return $this;
    }



    public function getTaille(): ?int
    {
        return $this->taille;
    }

    public function setTaille(int $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getMagasin(): ?Magasin
    {
        return $this->magasin;
    }

    public function setMagasin(?Magasin $magasin): self
    {
        $this->magasin = $magasin;

        return $this;
    }



    public function getNomarticle(): ?string
    {
        return $this->nomarticle;
    }

    public function setNomarticle(string $nomarticle): self
    {
        $this->nomarticle = $nomarticle;

        return $this;
    }


}
