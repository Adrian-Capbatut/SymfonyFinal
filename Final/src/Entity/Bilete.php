<?php

namespace App\Entity;

use App\Repository\BileteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BileteRepository::class)
 */
class Bilete
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $loc_plecare;

    /**
     * @ORM\Column(type="date")
     */
    private $data_plecare;

    /**
     * @ORM\Column(type="time")
     */
    private $ora_plecare;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $destinatia;

    /**
     * @ORM\Column(type="date")
     */
    private $data_sosire;

    /**
     * @ORM\Column(type="time")
     */
    private $ora_sosire;

    /**
     * @ORM\ManyToOne(targetEntity=Calatori::class, inversedBy="bilete")
     * @ORM\JoinColumn(nullable=false)
     */
    private $calator;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocPlecare(): ?string
    {
        return $this->loc_plecare;
    }

    public function setLocPlecare(string $loc_plecare): self
    {
        $this->loc_plecare = $loc_plecare;

        return $this;
    }

    public function getDataPlecare(): ?\DateTimeInterface
    {
        return $this->data_plecare;
    }

    public function setDataPlecare(\DateTimeInterface $data_plecare): self
    {
        $this->data_plecare = $data_plecare;

        return $this;
    }

    public function getOraPlecare(): ?\DateTimeInterface
    {
        return $this->ora_plecare;
    }

    public function setOraPlecare(\DateTimeInterface $ora_plecare): self
    {
        $this->ora_plecare = $ora_plecare;

        return $this;
    }

    public function getDestinatia(): ?string
    {
        return $this->destinatia;
    }

    public function setDestinatia(string $destinatia): self
    {
        $this->destinatia = $destinatia;

        return $this;
    }

    public function getDataSosire(): ?\DateTimeInterface
    {
        return $this->data_sosire;
    }

    public function setDataSosire(\DateTimeInterface $data_sosire): self
    {
        $this->data_sosire = $data_sosire;

        return $this;
    }

    public function getOraSosire(): ?\DateTimeInterface
    {
        return $this->ora_sosire;
    }

    public function setOraSosire(\DateTimeInterface $ora_sosire): self
    {
        $this->ora_sosire = $ora_sosire;

        return $this;
    }

    public function getCalator(): ?Calatori
    {
        return $this->calator;
    }

    public function setCalator(?Calatori $calator): self
    {
        $this->calator = $calator;

        return $this;
    }
}
