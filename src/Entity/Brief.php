<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\Repository\BriefRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ApiResource(
    operations: [
        new Post(
            openapiContext: [
                'security' => [['JWT' => [[]]]],
                'summary' => 'Create Brief',
                'description' => 'Permet de créer un Brief',
            ],
            shortName: 'Brief',
            denormalizationContext: ['groups' => ['create:Brief:item', 'create:Project:item', 'create:Target:item']]
        ),
        new Get(
            normalizationContext: ['groups' => ['read:Brief:item']]
        ),
        new GetCollection(
            normalizationContext: ['groups' => ['read:Brief:collection']]
        )
    ],
    collectDenormalizationErrors: true,
)]
#[ApiFilter(OrderFilter::class, properties: ['id' => 'DESC'])]
#[ORM\Entity(repositoryClass: BriefRepository::class)]
class Brief
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['read:Brief:collection', 'read:Brief:item'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['create:Brief:item', 'read:User:collection', 'read:Brief:item', 'read:Brief:collection'])]
    #[Assert\NotBlank(message: 'The name must be specified.')]
    #[Assert\Length(
        min: 5, max: 255, minMessage: 'The name must be at least {{ limit }} characters.', maxMessage: 'The name can\'t exceed {{ limit }} characters.'
    )]
    #[ApiProperty(openapiContext: ['type' => 'string', 'example' => 'Window offer.'])]
    private ?string $name = null;

    #[ORM\Column]
    #[Groups(['create:Brief:item', 'read:Brief:item', 'read:Brief:collection'])]
    #[ApiProperty(openapiContext: ['type' => 'boolean', 'example' => false, 'default' => false])]
    private ?bool $isSigned = false;

    #[ORM\Column]
    #[Groups(['read:Brief:item', 'read:Brief:collection'])]
    #[Assert\NotNull(message: 'createdAt cannot be null.')]
    private \DateTimeImmutable $createdAt;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['create:Brief:item', 'read:Brief:item'])]
    #[Assert\Url(message: 'The url {{ value }} is not a valid url.', protocols: ['http', 'https', 'ftp'])]
    #[ApiProperty(openapiContext: ['type' => 'url', 'example' => 'https://www.mylandingpage.com'])]
    private ?string $landingPageUrl = null;

    #[ORM\Column(length: 255)]
    #[Groups(['create:Brief:item', 'read:Brief:item'])]
    #[Assert\NotBlank(message: 'The budget must be specified.')]
    #[Assert\Positive(message: 'The budget cannot be less than or equal to 0.')]
    #[ApiProperty(openapiContext: ['type' => 'int', 'example' => '30'])]
    private ?int $totalBudget = null;

    #[ORM\Column]
    #[Groups(['create:Brief:item', 'read:Brief:item'])]
    #[Assert\NotBlank(message: 'The volume must be specified.')]
    #[Assert\Positive(message: 'The volume cannot be less than or equal to 0.')]
    #[ApiProperty(openapiContext: ['type' => 'int', 'example' => '300'])]
    private ?int $volume = null;

    #[ORM\OneToOne(inversedBy: 'brief', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['read:Brief:item', 'create:Brief:item'])]
    private ?Project $project = null;

    #[ORM\ManyToOne(inversedBy: 'briefs')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['read:Brief:item', 'create:Brief:item', 'read:Brief:collection'])]
    private ?User $user = null;

    #[ORM\OneToOne(mappedBy: 'brief', cascade: ['persist', 'remove'])]
    #[Groups(['read:Brief:item', 'create:Brief:item', 'read:Brief:collection'])]
    private ?Target $target = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull(message: 'businessModel cannot be null.')]
    #[Assert\NotBlank(message: 'businessModel must be specified.')]
    #[Groups(['create:Brief:item', 'read:Brief:item'])]
    private ?BusinessModel $businessModel = null;

    #[ORM\Column]
    #[Assert\Type(type: 'boolean', message: 'The value {{ value }} is not a valid {{ type }}.')]
    #[Groups(['create:Brief:item', 'read:Brief:item'])]
    private ?bool $needLP = null;

    #[ORM\Column]
    #[Assert\Type(type: 'boolean', message: 'The value {{ value }} is not a valid {{ type }}.')]
    #[Groups(['create:Brief:item', 'read:Brief:item'])]
    private ?bool $needKitMail = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['create:Brief:item', 'read:Brief:item'])]
    private ?string $comment = null;

    #[ORM\Column]
    #[Groups(['create:Brief:item', 'read:Brief:item'])]
    #[Assert\NotBlank(message: 'Unit Price must be specified.')]
    #[Assert\NotNull(message: 'Unit Price cannot be null.')]
    private ?float $unitPrice = null;

    #[ORM\Column(length: 150)]
    #[Groups(['create:Brief:item', 'read:Brief:item', 'read:Brief:collection'])]
    #[Assert\NotBlank(message: 'Status must be specified.')]
    #[Assert\NotNull(message: 'Status cannot be null.')]
    private ?string $status = null;

    #[ORM\Column]
    #[Groups(['create:Brief:item', 'read:Brief:item'])]
    #[Assert\NotBlank(message: 'Leverage must be specified.')]
    #[Assert\NotNull(message: 'Leverage cannot be null.')]
    private array $leverage = [];

    /**
     * @var Collection<int, Company>
     */
    
    #[ORM\ManyToMany(targetEntity: Company::class, inversedBy: 'briefParticipations')]
    #[ORM\JoinTable(name: 'brief_participations')]
    #[Groups(['update:Brief:item'])]
    private Collection $participatingCompanies;

    public function __construct()
    {
        $this->setCreatedAt(new \DateTimeImmutable('now', new \DateTimeZone('Europe/Paris')));
        $this->participatingCompanies = new ArrayCollection();
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

    public function isIsSigned(): ?bool
    {
        return $this->isSigned;
    }

    public function setIsSigned(bool $isSigned): static
    {
        $this->isSigned = $isSigned;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getLandingPageUrl(): ?string
    {
        return $this->landingPageUrl;
    }

    public function setLandingPageUrl(?string $landingPageUrl): static
    {
        $this->landingPageUrl = $landingPageUrl;

        return $this;
    }


    public function getTotalBudget(): ?int
    {
        return $this->totalBudget;
    }

    public function setTotalBudget(int $totalBudget): static
    {
        $this->totalBudget = $totalBudget;

        return $this;
    }

    public function getVolume(): ?int
    {
        return $this->volume;
    }

    public function setVolume(int $volume): static
    {
        $this->volume = $volume;

        return $this;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(Project $project): static
    {
        $this->project = $project;

        return $this;
    }


    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getTarget(): ?Target
    {
        return $this->target;
    }

    public function setTarget(Target $target): static
    {
        // set the owning side of the relation if necessary
        if ($target->getBrief() !== $this) {
            $target->setBrief($this);
        }

        $this->target = $target;

        return $this;
    }

    public function getBusinessModel(): ?BusinessModel
    {
        return $this->businessModel;
    }

    public function setBusinessModel(?BusinessModel $businessModel): static
    {
        $this->businessModel = $businessModel;

        return $this;
    }

    public function isNeedLP(): ?bool
    {
        return $this->needLP;
    }

    public function setNeedLP(bool $needLP): static
    {
        $this->needLP = $needLP;

        return $this;
    }

    public function isNeedKitMail(): ?bool
    {
        return $this->needKitMail;
    }

    public function setNeedKitMail(bool $needKitMail): static
    {
        $this->needKitMail = $needKitMail;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getUsers(): ?User
    {
        return $this->user;
    }

    public function setUsers(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getUnitPrice(): ?float
    {
        return $this->unitPrice;
    }

    public function setUnitPrice(float $unitPrice): static
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getLeverage(): array
    {
        return $this->leverage;
    }

    public function setLeverage(array $leverage): static
    {
        $this->leverage = $leverage;

        return $this;
    }

    /**
     * @return Collection<int, Company>
     */
    public function getPparticipatingCompanies(): Collection
    {
        return $this->participatingCompanies;
    }

    public function addPparticipatingCompany(Company $participatingCompany): static
    {
        if (!$this->participatingCompanies->contains($participatingCompany)) {
            $this->participatingCompanies->add($participatingCompany);
        }

        return $this;
    }

    public function removePparticipatingCompany(Company $participatingCompany): static
    {
        $this->participatingCompanies->removeElement($participatingCompany);

        return $this;
    }



}
