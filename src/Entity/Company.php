<?php

namespace App\Entity;

use AllowDynamicProperties;
use ApiPlatform\Doctrine\Orm\Filter\DateFilter;
use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Controller\Company\PatchCompanyController;
use App\Controller\TestController;
use App\Repository\CompanyRepository;
use App\State\CompanyCreationStateProcessor;
use DateTimeImmutable;
use DateTimeZone;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Serializer\Attribute\MaxDepth;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @Vich\Uploadable
 */
#[AllowDynamicProperties] #[Vich\Uploadable]
#[ORM\Entity(repositoryClass: CompanyRepository::class)]
#[ApiResource(
    operations: [
        new Post(
            inputFormats: ['multipart' => ['multipart/form-data']],
            openapiContext: [
                //'security' =>[ ['JWT' => [[]]]],
                'summary' => 'Create a new company',
                'description' => 'Permet de créer une nouvelle entreprise',
            ],
            normalizationContext: ['groups' => ['create:Company:item',]],
            denormalizationContext: ['groups' => ['create:Company:item', 'read:Company:item', 'read:Company:Role', 'read:Company:collection']],
            //processor: CompanyCreationStateProcessor::class, // Ici gestion de l'envoi d'email,
        ),
        new Get(),
        new GetCollection(
            openapiContext: [
                // security
                'summary' => 'Get Companies List',
                'description' => 'Allows the user to get the companies list'
            ],
            normalizationContext: ['groups' => ['read:Company:collection', 'read:Company:User', 'read:Company:item',]],
            denormalizationContext: ['groups' => ['read:Company:item']],
        ),
        new Patch(
            inputFormats: ['multipart' => ['multipart/form-data']],
            controller: PatchCompanyController::class,
            openapiContext: [
                'operations' => ['methods' => ['PATCH']],
                'summary' => 'Update a company',
                'description' => 'Allows the user to update a company by specifying One field or Many'
            ],
            normalizationContext: ['groups' => ['read:Company:collection']],
            denormalizationContext: ['groups' => ['update:Company:item', 'read:Company:collection']]
        ),
        new Delete()
    ]
)]
#[ApiFilter(SearchFilter::class, properties: ['name' => 'word_start'])]
#[ApiFilter(OrderFilter::class, properties: ['name', 'createdAt'], arguments: ['orderParameterName' => 'order'])]
#[ApiFilter(DateFilter::class, properties: ['createdAt'])]
#[UniqueEntity(
    fields: ['vatNumber'],
    message: 'A company with this VAT Number already exists.',
    errorPath: 'vatNumber',
)]
#[UniqueEntity(
    fields: ['companyRegistrationNumber'],
    message: 'A company with this registration Number already exists.',
    errorPath: 'companyRegistrationNumber',
)]
class Company
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['read:Company:collection', 'read:Company:item'])]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Groups(['create:Company:item', 'read:Company:collection', 'update:Company:item', 'read:Company:User'])]
    #[ApiProperty(openapiContext: ['type' => 'string', 'example' => 'My Company name'])]
    #[Assert\NotNull(message: 'Name can\'t be null.')]
    #[Assert\NotBlank(message: 'Name must be specified.')]
    #[Assert\Length(min: 5, minMessage: 'Name must contain at least 5 characters ')]
    private ?string $name = null;

    #[ORM\Column]
    #[Groups(['create:Company:item', 'read:Company:collection', 'update:Company:item'])]
    #[ApiProperty(openapiContext: ['type' => 'string', 'example' => '75000'])]
    #[Assert\length(exactly: 5, exactMessage: 'ZipCode should have exactly {{ limit }} characters.')]
    #[Assert\NotNull(message: 'ZipCode can\'t be null.')]
    #[Assert\NotBlank(message: 'ZipCode must be specified.')]
    #[Assert\Regex(pattern: '/^[0-9]+$/', message: 'ZipCode must only contain digits.')]
    private ?string $zipcode = null;

    #[ORM\Column(length: 100)]
    #[Groups(['create:Company:item', 'read:Company:collection', 'update:Company:item'])]
    #[ApiProperty(openapiContext: ['type' => 'string', 'example' => 'Paris'])]
    #[Assert\NotNull(message: 'City can\'t be null.')]
    #[Assert\NotBlank(message: 'City must be specified.')]
    private ?string $city = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['create:Company:item', 'read:Company:collection', 'update:Company:item'])]
    #[ApiProperty(openapiContext: ['type' => 'string', 'example' => 'Avenue du Général Leclerc'])]
    private ?string $address = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'The Company Registration Number must be specified.')]
    #[Assert\NotNull(message: 'The Company Registration Number can\'t be null.')]
    #[Assert\Regex(pattern: '/^[0-9]+$/', message: 'The Company Registration Number  must only contain digits.')]
    #[Groups(['create:Company:item', 'read:Company:collection', 'update:Company:item'])]
    #[ApiProperty(openapiContext: ['type' => 'string', 'example' => '12345678912345'])]
    private ?string $companyRegistrationNumber = null;

    #[ORM\Column]
    #[Groups(['read:Company:collection'])]
    private ?DateTimeImmutable $createdAt = null;


    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['create:Company:item', 'read:Company:collection', 'read:Company:item'])]
    private ?string $logo = null;

    #[ORM\Column(length: 100)]
    #[Groups(['create:Company:item', 'read:Company:collection', 'update:Company:item'])]
    #[Assert\NotNull(message: 'Country can\'t be null.')]
    #[Assert\NotBlank(message: 'Country must be specified.')]
    #[ApiProperty(openapiContext: ['type' => 'string', 'example' => 'France'])]
    private ?string $country = null;

    #[ORM\Column(length: 255)]
    #[Groups(['create:Company:item', 'read:Company:collection', 'update:Company:item'])]
    #[Assert\NotNull(message: 'vatNumber cannot be null.')]
    #[Assert\NotBlank(message: 'vatNumber must be specified.')]
    #[Assert\Regex(pattern: '/^[0-9]+$/', message: 'The VAT Number  must only contain digits.')]
    private ?string $vatNumber = null;

    #[ORM\OneToMany(targetEntity: User::class, mappedBy: 'company', cascade: ['persist', 'remove'])]
    #[Groups(['read:Company:collection', 'read:Company:item',])]
    private Collection $users;

    /* #[ORM\Column]
     private array $roles = [];*/

    /**
     * @Vich\UploadableField(mapping="company_logo", fileNameProperty="logo")
     */


    #[Vich\UploadableField(mapping: 'company_logo', fileNameProperty: 'logo', size: 'imageSize')]
    #[Groups(['create:Company:item'])]
    private ?File $logoFile = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['create:Company:item', 'read:Company:collection', 'read:Company:User'])]
    public ?string $logoUrl = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['create:Company:item', 'read:Company:collection'])]
    public ?string $logoBase64 = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['create:Company:item', 'read:Company:collection'])]
    private ?int $imageSize = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['create:Company:item', 'read:Company:item', 'read:Company:collection', 'update:Company:item'])]
    #[Assert\NotBlank(message: 'The email must be specified.')]
    #[Assert\Email(message: 'The email {{ value }} is not a valid email.')]
    #[ApiProperty(openapiContext: ['type' => 'email', 'example' => 'test@gmail.com'])]
    private ?string $mainUserEmail = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['create:Company:item', 'read:Company:item', 'read:Company:collection'])]
    #[Assert\NotBlank(message: 'Firstname must be specified.')]
    #[Assert\NotNull(message: 'Firstname cannot be null.')]
    #[Assert\Length(min: 3, minMessage: 'Firstname must be at least {{ limit }} characters.')]
    #[ApiProperty(openapiContext: ['type' => 'string', 'example' => 'Firstname'])]
    private ?string $mainUserFirstname = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['create:Company:item', 'read:Company:item', 'read:Company:collection'])]
    #[Assert\NotBlank(message: 'Lastname must be specified.')]
    #[Assert\NotNull(message: 'Lastname cannot be null.')]
    #[Assert\Length(min: 3, minMessage: 'Lastname must be at least {{ limit }} characters.')]
    #[ApiProperty(openapiContext: ['type' => 'string', 'example' => 'Lastname'])]
    private ?string $mainUserLastname = null;


    // Permet de savoir si l'inscription vient du formulaire d'inscription ou si c'est un admin oceads qui a créer une entreprise
    // l'email change en conséquence
    #[Groups(['create:Company:item'])]
    private ?string $signUp = null;

    /**
     * @var Collection<int, Brief>
     */
    #[ORM\ManyToMany(targetEntity: Brief::class, mappedBy: 'participatingCompanies')]
    //#[Groups(['create:Company:item'])]
    private Collection $briefParticipations;

    /**
     * @var Collection<int, RolesCompany>
     */
    #[ORM\ManyToMany(targetEntity: RolesCompany::class, inversedBy: 'companies')]
    #[Assert\NotBlank(message: 'role must be specified.')]
    #[ORM\JoinTable(name: 'companyRole')]
    private Collection $companyRole;



    public function __construct()
    {
        $timezone = new DateTimeZone('Europe/Paris');
        $this->setCreatedAt(new DateTimeImmutable('now', $timezone));
        $this->users = new ArrayCollection();
        $this->briefParticipations = new ArrayCollection();
        $this->companyRole = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
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

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zipcode): static
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getCompanyRegistrationNumber(): ?string
    {
        return $this->companyRegistrationNumber;
    }

    public function setCompanyRegistrationNumber(string $companyRegistrationNumber): static
    {
        $this->companyRegistrationNumber = $companyRegistrationNumber;

        return $this;
    }

    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): static
    {
        $this->logo = $logo;

        return $this;
    }

    public function getLogoUrl(): ?string
    {
        return $this->logoUrl;
    }

    public function setLogoUrl(?string $logoUrl): static
    {
        $this->logoUrl = $logoUrl;

        return $this;
    }


    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getVatNumber(): ?string
    {
        return $this->vatNumber;
    }

    public function setVatNumber(string $vatNumber): static
    {
        $this->vatNumber = $vatNumber;

        return $this;
    }

    /* public function getRoles(): array
     {
         return $this->roles;
     }

     public function setRoles(array $roles): static
     {
         $this->roles = $roles;

         return $this;
     }*/

    public function getLogoFile(): ?File
    {
        return $this->logoFile;
    }

    public function setLogoFile(?File $logoFile): void
    {
        $this->logoFile = $logoFile;

        if (null !== $logoFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }


    public function setLogoBase64(?string $logoBase64): void
    {
        $this->logoBase64 = $logoBase64;
    }

    public function getLogoBase64(): ?string
    {
        return $this->logoBase64;
    }

    public function setImageSize(?int $imageSize): void
    {
        $this->imageSize = $imageSize;
    }

    public function getImageSize(): ?int
    {
        return $this->imageSize;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUsers(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setCompany($this);
        }

        return $this;
    }

    public function removeUsers(User $user): static
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getCompany() === $this) {
                $user->setCompany(null);
            }
        }

        return $this;
    }

    public function getMainUserEmail(): ?string
    {
        return $this->mainUserEmail;
    }

    public function setMainUserEmail(string $mainUserEmail): static
    {
        $this->mainUserEmail = $mainUserEmail;

        return $this;
    }

    public function getMainUserFirstname(): ?string
    {
        return $this->mainUserFirstname;
    }

    public function setMainUserFirstname(string $mainUserFirstname): static
    {
        $this->mainUserFirstname = $mainUserFirstname;

        return $this;
    }

    public function getMainUserLastname(): ?string
    {
        return $this->mainUserLastname;
    }

    public function setMainUserLastname(string $mainUserLastname): static
    {
        $this->mainUserLastname = $mainUserLastname;
        return $this;
    }

    public function setSignUp($signUp): static
    {
        $this->signUp = $signUp;
        return $this;
    }

    public function getSignUp()
    {
        return $this->signUp;
    }


    /**
     * @return Collection<int, Brief>
     */
    public function getBriefParticipations(): Collection
    {
        return $this->briefParticipations;
    }

    public function addBriefParticipation(Brief $briefParticipation): static
    {
        if (!$this->briefParticipations->contains($briefParticipation)) {
            $this->briefParticipations->add($briefParticipation);
            $briefParticipation->addPparticipatingCompany($this);
        }

        return $this;
    }

    public function removeBriefParticipation(Brief $briefParticipation): static
    {
        if ($this->briefParticipations->removeElement($briefParticipation)) {
            $briefParticipation->removePparticipatingCompany($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, RolesCompany>
     */
    public function getCompanyRole(): Collection
    {
        return $this->companyRole;
    }

    public function addCompanyRole(RolesCompany $companyRole): static
    {
        if (!$this->companyRole->contains($companyRole)) {
            $this->companyRole->add($companyRole);
        }

        return $this;
    }

    public function removeCompanyRole(RolesCompany $companyRole): static
    {
        $this->companyRole->removeElement($companyRole);

        return $this;
    }




}
