<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TruckRepository")
 */
class Truck
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=8, nullable=true)
     */
    private $kenteken;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $merk;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $bouwjaar;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKenteken(): ?string
    {
        return $this->kenteken;
    }

    public function setKenteken(?string $kenteken): self
    {
        $this->kenteken = $kenteken;

        return $this;
    }

    public function getMerk(): ?string
    {
        return $this->merk;
    }

    public function setMerk(?string $merk): self
    {
        $this->merk = $merk;

        return $this;
    }

    public function getBouwjaar(): ?int
    {
        return $this->bouwjaar;
    }

    public function setBouwjaar(?int $bouwjaar): self
    {
        $this->bouwjaar = $bouwjaar;

        return $this;
    }
}
