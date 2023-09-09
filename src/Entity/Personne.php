<?php

namespace App\Entity;

use App\Repository\PersonneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonneRepository::class)]
class Personne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $date_naissance = null;

    #[ORM\Column(length: 255)]
    private ?string $niveau_scolaire = null;

    #[ORM\Column(length: 255)]
    private ?string $module = null;

    #[ORM\Column(length: 255)]
    private ?string $motif_inscription = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?string
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(string $date_naissance): static
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getNiveauScolaire(): ?string
    {
        return $this->niveau_scolaire;
    }

    public function setNiveauScolaire(string $niveau_scolaire): static
    {
        $this->niveau_scolaire = $niveau_scolaire;

        return $this;
    }

    public function getModule(): ?string
    {
        return $this->module;
    }

    public function setModule(string $module): static
    {
        $this->module = $module;

        return $this;
    }

    public function getMotifInscription(): ?string
    {
        return $this->motif_inscription;
    }

    public function setMotifInscription(string $motif_inscription): static
    {
        $this->motif_inscription = $motif_inscription;

        return $this;
    }
}
