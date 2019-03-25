<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LogboekRepository")
 */
class Logboek
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $Begeleidingsbrief;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $Datum;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $Chauffeur;

    /**
     * @ORM\Column(type="integer")
     */
    private $Truck;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $AantalM3;

    /**
     * @ORM\Column(type="string", length=35, nullable=true)
     */
    private $Laadlocatie;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $Tijdvertrek;

    /**
     * @ORM\Column(type="string", length=35, nullable=true)
     */
    private $Bestemming;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Evenement;

    /**
     * @ORM\Column(type="integer")
     */
    private $User_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $truck;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBegeleidingsbrief(): ?string
    {
        return $this->Begeleidingsbrief;
    }

    public function setBegeleidingsbrief(?string $Begeleidingsbrief): self
    {
        $this->Begeleidingsbrief = $Begeleidingsbrief;

        return $this;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->Datum;
    }

    public function setDatum(?\DateTimeInterface $Datum): self
    {
        $this->Datum = $Datum;

        return $this;
    }

    public function getChauffeur(): ?string
    {
        return $this->Chauffeur;
    }

    public function setChauffeur(?string $Chauffeur): self
    {
        $this->Chauffeur = $Chauffeur;

        return $this;
    }

    public function getTruck(): ?int
    {
        return $this->Truck;
    }

    public function setTruck(int $Truck): self
    {
        $this->Truck = $Truck;

        return $this;
    }

    public function getAantalM3(): ?int
    {
        return $this->AantalM3;
    }

    public function setAantalM3(?int $AantalM3): self
    {
        $this->AantalM3 = $AantalM3;

        return $this;
    }

    public function getLaadlocatie(): ?string
    {
        return $this->Laadlocatie;
    }

    public function setLaadlocatie(?string $Laadlocatie): self
    {
        $this->Laadlocatie = $Laadlocatie;

        return $this;
    }

    public function getTijdvertrek(): ?\DateTimeInterface
    {
        return $this->Tijdvertrek;
    }

    public function setTijdvertrek(?\DateTimeInterface $Tijdvertrek): self
    {
        $this->Tijdvertrek = $Tijdvertrek;

        return $this;
    }

    public function getBestemming(): ?string
    {
        return $this->Bestemming;
    }

    public function setBestemming(?string $Bestemming): self
    {
        $this->Bestemming = $Bestemming;

        return $this;
    }

    public function getEvenement(): ?bool
    {
        return $this->Evenement;
    }

    public function setEvenement(bool $Evenement): self
    {
        $this->Evenement = $Evenement;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->User_id;
    }

    public function setUserId(int $User_id): self
    {
        $this->User_id = $User_id;

        return $this;
    }
}
