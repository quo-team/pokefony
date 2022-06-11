<?php

namespace App\Entity;

use App\Repository\EspecePokemonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EspecePokemonRepository::class)]
class EspecePokemon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $libelle;

    #[ORM\Column(type: 'boolean')]
    private $evolution;

    #[ORM\Column(type: 'boolean')]
    private $starter;

    #[ORM\Column(type: 'string', length: 255)]
    private $type_courbe_niveau;

    #[ORM\ManyToOne(targetEntity: TypePokemon::class)]
    private $type_1;

    #[ORM\ManyToOne(targetEntity: TypePokemon::class)]
    private $type_2;

    #[ORM\Column(type: 'string', length: 1000000)]
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getEvolution(): ?bool
    {
        return $this->evolution;
    }

    public function setEvolution(bool $evolution): self
    {
        $this->evolution = $evolution;

        return $this;
    }

    public function getStarter(): ?bool
    {
        return $this->starter;
    }

    public function setStarter(bool $starter): self
    {
        $this->starter = $starter;

        return $this;
    }

    public function getTypeCourbeNiveau(): ?string
    {
        return $this->type_courbe_niveau;
    }

    public function setTypeCourbeNiveau(string $type_courbe_niveau): self
    {
        $this->type_courbe_niveau = $type_courbe_niveau;

        return $this;
    }

    public function getType1(): ?TypePokemon
    {
        return $this->type_1;
    }

    public function setType1(?TypePokemon $type_1): self
    {
        $this->type_1 = $type_1;

        return $this;
    }

    public function getType2(): ?TypePokemon
    {
        return $this->type_2;
    }

    public function setType2(?TypePokemon $type_2): self
    {
        $this->type_2 = $type_2;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
