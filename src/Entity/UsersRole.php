<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\UsersRoleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: UsersRoleRepository::class)]
#[ApiResource(
    operations: [
        new Get(
            normalizationContext: ['groups' => ['read:User:Role', 'read:User:item', 'read:User:collection']]
        ),
        new GetCollection(
           normalizationContext: ['groups' => ['read:User:Role']]
        )
    ]
)]
class UsersRole
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['read:User:Role'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read:User:Role'])]
    private ?string $name = null;
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
