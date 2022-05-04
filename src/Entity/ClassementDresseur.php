<?php

namespace App\Entity;

use App\Repository\ClassementDresseurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClassementDresseurRepository::class)]
class ClassementDresseur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $labelClassement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabelClassement(): ?string
    {
        return $this->labelClassement;
    }

    public function setLabelClassement(string $labelClassement): self
    {
        $this->labelClassement = $labelClassement;

        return $this;
    }
}
