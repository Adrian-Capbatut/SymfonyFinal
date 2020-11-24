<?php

namespace App\Entity;

use App\Repository\CalatoriRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CalatoriRepository::class)
 */
class Calatori
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
    private $nume;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenume;

    /**
     * @ORM\Column(type="integer")
     */
    private $varsta;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cod_personal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresa;

    /**
     * @ORM\OneToMany(targetEntity=Bilete::class, mappedBy="calator", orphanRemoval=true)
     */
    private $bilete;

    public function __construct()
    {
        $this->bilete = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNume(): ?string
    {
        return $this->nume;
    }

    public function setNume(string $nume): self
    {
        $this->nume = $nume;

        return $this;
    }

    public function getPrenume(): ?string
    {
        return $this->prenume;
    }

    public function setPrenume(string $prenume): self
    {
        $this->prenume = $prenume;

        return $this;
    }

    public function getVarsta(): ?int
    {
        return $this->varsta;
    }

    public function setVarsta(int $varsta): self
    {
        $this->varsta = $varsta;

        return $this;
    }

    public function getCodPersonal(): ?string
    {
        return $this->cod_personal;
    }

    public function setCodPersonal(string $cod_personal): self
    {
        $this->cod_personal = $cod_personal;

        return $this;
    }

    public function getAdresa(): ?string
    {
        return $this->adresa;
    }

    public function setAdresa(?string $adresa): self
    {
        $this->adresa = $adresa;

        return $this;
    }

    /**
     * @return Collection|Bilete[]
     */
    public function getBilete(): Collection
    {
        return $this->bilete;
    }

    public function addBilete(Bilete $bilete): self
    {
        if (!$this->bilete->contains($bilete)) {
            $this->bilete[] = $bilete;
            $bilete->setCalator($this);
        }

        return $this;
    }

    public function removeBilete(Bilete $bilete): self
    {
        if ($this->bilete->removeElement($bilete)) {
            // set the owning side to null (unless already changed)
            if ($bilete->getCalator() === $this) {
                $bilete->setCalator(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return ($this->id.": ".$this->nume." ".$this->prenume);
    }
}
