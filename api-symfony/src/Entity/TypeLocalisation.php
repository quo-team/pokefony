<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TypeLocalisationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeLocalisationRepository::class)]
#[ApiResource]
class TypeLocalisation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: TypePokemon::class)]
    private $type;

    #[ORM\ManyToOne(targetEntity: Localisation::class)]
    private $localisation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?TypePokemon
    {
        return $this->type;
    }

    public function setType(?TypePokemon $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getLocalisation(): ?Localisation
    {
        return $this->localisation;
    }

    public function setLocalisation(?Localisation $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }
}
