<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\Repository\TargetRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;
use App\Validator as AcmeAssert;

#[ApiResource( operations: [
    new Post(
        openapiContext: [
            'security' =>[ ['JWT' => [[]]]],
            'summary' => 'Create a target to clarify the brief.',
            'description' => 'Permet de créer une cible précise pour un brief',
        ],

        denormalizationContext: ['groups' => ['create:Target:item']],
    ),
    new Get(normalizationContext: ['groups' => ['read:Target:item']],),
    new GetCollection(normalizationContext: ['groups' => ['read:Target:collection']],)
])]

#[ORM\Entity(repositoryClass: TargetRepository::class)]
class Target
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['create:Target:item', 'read:Target:collection', 'read:Target:item'])]
    private ?int $id = null;

    #[ORM\Column()]
    #[Groups(['create:Target:item', 'read:Target:collection', 'read:Target:item'])]
    #[AcmeAssert\isValidTarget(['civilStatusMode'])]// custom validator
    #[ApiProperty(openapiContext: ['type' => 'array', 'description' => 'Peut contenir plusieurs valeurs', 'example' => ['Marié(e)', 'Célibataire'], 'enum' => ['Marié(e)', 'Célibataire', 'Divorcé(e)']])]
    private array $civilStatus = [];

    #[ORM\Column]
    #[Groups(['create:Target:item', 'read:Target:collection', 'read:Target:item'])]
    #[AcmeAssert\isValidTarget(['genderMode'])]// custom validator
    #[ApiProperty(openapiContext: ['type' => 'array', 'description' => 'Peut contenir plusieurs valeurs', 'example' => ['Homme', 'Femme'], 'enum' => ['Homme', 'Femme']])]
    private array $gender = [];

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['create:Target:item', 'read:Target:collection', 'read:Target:item'])]
    private ?string $ageRange = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['create:Target:item', 'read:Target:collection', 'read:Target:item'])]
    #[AcmeAssert\isValidTarget(['housingStatusMode'])]// custom validator
    #[ApiProperty(openapiContext: ['type' => 'array', 'description' => 'Peut contenir plusieurs valeurs', 'example' => ['Propriétaire'], 'enum' => ['Propriétaire', 'Locataire']])]
    private ?array $housingStatus = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['create:Target:item', 'read:Target:collection', 'read:Target:item'])]
    #[AcmeAssert\isValidTarget(['housingTypeMode'])]// custom validator
    #[ApiProperty(openapiContext: ['type' => 'array', 'description' => 'Peut contenir plusieurs valeurs', 'example' => ['Maison'], 'enum' => ['Maison', 'Appartement']])]
    private ?array $housingType = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['create:Target:item', 'read:Target:collection', 'read:Target:item'])]
    #[AcmeAssert\isValidTarget(['housingDataMode'])]// custom validator
    #[ApiProperty(openapiContext: ['type' => 'array', 'description' => 'Peut contenir plusieurs valeurs', 'example' => ['Piscine', 'PAC'], 'enum' => ['Piscine', 'PAC', 'Radiateur Solaire', 'Radiateur Electrique', 'Chauffe-eau', 'Climatiseur', 'Classe Energie: A', 'Classe Energie: B', 'Classe Energie: C', 'Classe Energie: D','Classe Energie: E','Classe Energie: F', 'Classe Energie: G']])]
    private ?array $housingData = null;

    #[ORM\Column(type: 'json', nullable: true)]
    #[\Symfony\Component\Serializer\Annotation\Groups(['create:Target:item', 'read:Target:item'])]
    #[AcmeAssert\isValidGeolocatedContext]// contrainte custom
    #[ApiProperty(openapiContext: ['type' => 'array', 'example' => '["75","80","60000","59005"]'])]
    private ?array $geolocatedContext = null;

    #[ORM\OneToOne(inversedBy: 'target', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['create:Target:item', 'read:Target:item'])]
    #[ApiProperty(openapiContext: ['type' => 'string', 'description' => 'IRI de la ressource', 'example' => '/briefApi/brieves/{id}'])]
    private ?Brief $brief = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCivilStatus(): array
    {
        return $this->civilStatus;
    }

    public function setCivilStatus(array $civilStatus): static
    {
        $this->civilStatus = $civilStatus;

        return $this;
    }

    public function getGender(): array
    {
        return $this->gender;
    }

    public function setGender(array $gender): static

    {
        $this->gender = $gender;

        return $this;
    }

    public function getAgeRange(): ?string
    {
        return $this->ageRange;
    }

    public function setAgeRange(?string $ageRange): static
    {
        $this->ageRange = $ageRange;

        return $this;
    }

    public function getHousingStatus(): ?array
    {
        return $this->housingStatus;
    }

    public function setHousingStatus(?array $housingStatus): static
    {
        $this->housingStatus = $housingStatus;

        return $this;
    }

    public function getHousingType(): ?array
    {
        return $this->housingType;
    }

    public function setHousingType(?array $housingType): static
    {
        $this->housingType = $housingType;

        return $this;
    }

    public function getHousingData(): ?array
    {
        return $this->housingData;
    }

    public function setHousingData(?array $housingData): static
    {
        $this->housingData = $housingData;

        return $this;
    }

    public function getGeolocatedContext(): ?array
    {
        return $this->geolocatedContext;
    }

    public function setGeolocatedContext(?array $geolocatedContext): static
    {
        $this->geolocatedContext = $geolocatedContext;

        return $this;
    }

    public function getBrief(): ?Brief
    {
        return $this->brief;
    }

    public function setBrief(Brief $brief): static
    {
        $this->brief = $brief;

        return $this;
    }
}
