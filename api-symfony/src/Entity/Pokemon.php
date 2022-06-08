<?php

namespace App\Entity;

use App\Repository\PokemonRepository;
use Doctrine\ORM\Mapping as ORM;

use ApiPlatform\Core\Annotation\ApiResource;

#[ORM\Entity(repositoryClass: PokemonRepository::class)]
#[ApiResource]

class Pokemon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'integer')]
    private $xp;

    #[ORM\Column(type: 'string', length: 255)]
    private $sexe;

    #[ORM\ManyToOne(targetEntity: EspecePokemon::class)]
    private $espece;

    #[ORM\Column(type: 'datetime', nullable:true)]
    private $entrainement;

    #[ORM\Column(type: 'boolean')]
    private $chasse;

    #[ORM\Column(type: 'datetime', nullable:true)]
    private $date_chasse;

    #[ORM\ManyToOne(targetEntity: User::class)]
    private $dresseur;

    #[ORM\Column(type: 'integer')]
    private $niveau;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getXp(): ?int
    {
        return $this->xp;
    }

    public function setXp(int $xp): self
    {
        $this->xp = $xp;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getEspece(): ?EspecePokemon
    {
        return $this->espece;
    }

    public function setEspece(?EspecePokemon $espece): self
    {
        $this->espece = $espece;

        return $this;
    }

    public function getEntrainement(): ?\DateTimeInterface
    {
        return $this->entrainement;
    }

    public function setEntrainement(\DateTimeInterface $entrainement): self
    {
        $this->entrainement = $entrainement;

        return $this;
    }

    public function getChasse(): ?bool
    {
        return $this->chasse;
    }

    public function setChasse(bool $chasse): self
    {
        $this->chasse = $chasse;

        return $this;
    }

    public function getDateChasse(): ?\DateTimeInterface
    {
        return $this->date_chasse;
    }

    public function setDateChasse(\DateTimeInterface $date_chasse): self
    {
        $this->date_chasse = $date_chasse;

        return $this;
    }

    public function getDresseur(): ?User
    {
        return $this->dresseur;
    }

    public function setDresseur(?User $dresseur): self
    {
        $this->dresseur = $dresseur;

        return $this;
    }

    public function getNiveau(): ?int
    {
        return $this->niveau;
    }

    public function setNiveau(int $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }
}
