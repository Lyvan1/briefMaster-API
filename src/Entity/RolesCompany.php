<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\RolesCompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ApiResource(operations:[
    new Get(
        normalizationContext:[ 'groups' => 'read:Company:Role','read:Company:item', 'read:Company:collection'],
    ),
    new GetCollection(
        normalizationContext:[ 'groups' => 'read:Company:Role']
    )
])]
#[ORM\Entity(repositoryClass: RolesCompanyRepository::class)]
class RolesCompany
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[Groups(['read:Company:Role'])]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
   #[Groups(['read:Company:Role'])]
    private ?string $name = null;

    public function __construct()
    {

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }


}
