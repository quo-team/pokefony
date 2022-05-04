<?php

namespace App\Entity;

use App\Repository\PokemonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PokemonRepository::class)]
class Pokemon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $name;

    #[ORM\Column(type: 'smallint')]
    private $evolution;

    #[ORM\Column(type: 'smallint')]
    private $starter;

    #[ORM\Column(type: 'string', length: 1)]
    private $typeCourbeNiveau;

    #[ORM\Column(type: 'integer')]
    private $type1;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEvolution(): ?int
    {
        return $this->evolution;
    }

    public function setEvolution(int $evolution): self
    {
        $this->evolution = $evolution;

        return $this;
    }

    public function getStarter(): ?int
    {
        return $this->starter;
    }

    public function setStarter(int $starter): self
    {
        $this->starter = $starter;

        return $this;
    }

    public function getTypeCourbeNiveau(): ?string
    {
        return $this->typeCourbeNiveau;
    }

    public function setTypeCourbeNiveau(string $typeCourbeNiveau): self
    {
        $this->typeCourbeNiveau = $typeCourbeNiveau;

        return $this;
    }

    public function getType1(): ?int
    {
        return $this->type1;
    }

    public function setType1(int $type1): self
    {
        $this->type1 = $type1;

        return $this;
    }
}
