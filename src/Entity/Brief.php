<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\Controller\BriefController;
use App\Repository\BriefRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use App\Validator as AcmeAssert;

#[ApiResource(
    operations: [
        //Utilisation d'un controller personnalisé pour la création de brief. Car en prepersist il faut créer le projet lié au brief.
        new Post(
            //uriTemplate: '/brieves',
           // controller: BriefController::class,
            openapiContext: [
                'security' =>[ ['JWT' => [[]]]],
                'summary' => 'Create Brief',
                'description' => 'Permet de créer un Brief',
            ],
            denormalizationContext: ['groups' => ['create:Brief:item', 'create:Project:item']],
            //name: 'app_brief',
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
        min: 10, max: 255, minMessage: 'The name must be at least {{ limit }} characters.', maxMessage: 'The name can\'t exceed {{ limit }} characters.'
    )]
    #[ApiProperty(openapiContext: ['type' => 'string', 'example' => 'Window offer.'])]
    private ?string $name = null;

    #[ORM\Column]
    #[Groups(['create:Brief:item', 'read:Brief:item', 'read:Brief:collection'])]
    #[ApiProperty(openapiContext: ['type' => 'boolean', 'example' => false, 'default' => false])]
    private ?bool $isSigned = false;

    #[ORM\Column]
    #[Groups(['read:Brief:item','read:Brief:collection'])]
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

    #[ORM\ManyToOne(inversedBy: 'briefs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $users = null;


    public function __construct()
    {
        $this->setCreatedAt(new \DateTimeImmutable('now', new \DateTimeZone('Europe/Paris')));
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


    public function getUser(): ?UserOld
    {
        return $this->user;
    }

    public function setUser(?UserOld $user): static
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
        return $this->users;
    }

    public function setUsers(?User $users): static
    {
        $this->users = $users;

        return $this;
    }


}
