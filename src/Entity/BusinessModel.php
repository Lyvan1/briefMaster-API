<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\Repository\BusinessModelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ApiResource(
    operations: [
        new Post(

                normalizationContext: ['groups' => ['read:BusinessModel:item']],
                denormalizationContext: ['groups' => ['create:BusinessModel:item']],

        ),
        new Get(
            normalizationContext: ['groups' => ['read:BusinessModel:item']],
            denormalizationContext: ['groups' => ['create:BusinessModel:item']],
        ),
        new GetCollection(
            normalizationContext: ['groups' => ['read:BusinessModel:item']],
            denormalizationContext: ['groups' => ['create:BusinessModel:item']],
        )
    ]
)]
#[ORM\Entity(repositoryClass: BusinessModelRepository::class)]
class BusinessModel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['read:BusinessModel:item'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read:BusinessModel:item','create:BusinessModel:item'])]
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



//    public function __toString()
//    {
//        return (string) $this->getName();
//    }

}
