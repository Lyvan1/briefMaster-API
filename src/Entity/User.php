<?php

namespace App\Entity;

use AllowDynamicProperties;
use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\Controller\LoggedUserController;
use App\Repository\UsersRepository;
use App\State\UserCreationStateProcessor;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @Vich\Uploadable
 */
#[AllowDynamicProperties] #[Vich\Uploadable]
#[ApiResource(
    operations: [
        new Post(
            inputFormats: ['multipart' => ['multipart/form-data']],
            openapiContext: [
                //'security' => [['JWT' => [[]]]],
                'summary' => 'Create user',
                'description' => 'Permet de créer un utilisateur',
            ],
            normalizationContext: ['groups' => ['read:User:item', 'read:User:collection', 'read:Company:User', 'read:User:Role']],
            denormalizationContext: ['groups' => ['create:User:item', ]],
            processor: UserCreationStateProcessor::class, //Hashage du mot de passe
        ),

        new Get(
            normalizationContext: ['groups' => ['read:User:item', 'read:Company:User',]],
            denormalizationContext: ['groups' => ['read:User:item', 'read:Company:User']],
        ),

        new GetCollection(
            normalizationContext: ['groups' => ['read:User:collection', 'read:Company:User', 'read:User:Role']],
            denormalizationContext: ['groups' => ['read:User:item', 'read:Company:User', 'read:User:Role']],
        ),
        new GetCollection(
            uriTemplate: '/logged',
            controller: LoggedUserController::class
        )
    ],
    collectDenormalizationErrors: true,

)]
#[UniqueEntity(fields: ['email'], message: 'This email already exists.')]
#[ORM\Entity(repositoryClass: UsersRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['read:User:item', 'read:User:collection', 'read:Company:User'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['create:User:item', 'read:User:item', 'read:User:collection', 'read:Company:User'])]
    #[Assert\NotBlank(message: 'The email must be specified.')]
    #[Assert\Email(message: 'The email {{ value }} is not a valid email.')]
    #[ApiProperty(openapiContext: ['type' => 'email', 'example' => 'test@gmail.com'])]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Groups(['create:User:item'])]
    #[Assert\NotBlank(message: 'The password must be specified.')]
    #[Assert\NotNull(message: 'Password is required.')]
    #[Assert\Length(min: 8, minMessage: 'The password must be at least {{ limit }} characters.')]
    #[Assert\Regex(
        pattern: '/(?=.*[a-z])/',
        message: 'The password must have at least one lowercase letter.',
        match: true,
    )]
    #[Assert\Regex(
        pattern: '/(?=.*[A-Z])/',
        message: 'The password must have at least one uppercase letter.',
        match: true,
    )]
    #[Assert\Regex(
        pattern: '/(?=.*\d)/',
        message: 'The password must have at least one number.',
        match: true,
    )]
    #[Assert\Regex(
        pattern: '/(?=.*[@$!%*?&\/])/',
        message: 'The password must have at least one special characters.',
        match: true,
    )]
    #[ApiProperty(openapiContext: ['type' => 'string', 'example' => '*Gh50uY5*'])]
    private ?string $password = null;

    #[ORM\OneToMany(targetEntity: Brief::class, mappedBy: 'users')]
    private Collection $briefs;

    #[ORM\Column(length: 255)]
    #[Groups(['create:User:item', 'read:User:item', 'read:User:collection', 'read:Company:User'])]
    #[Assert\NotBlank(message: 'Firstname must be specified.')]
    #[Assert\NotBlank(message: 'Firstname must be specified.')]
    #[Assert\Length(min: 3, minMessage: 'Firstname must be at least {{ limit }} characters.')]
    #[ApiProperty(openapiContext: ['type' => 'string', 'example' => 'Firstname'])]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    #[Groups(['create:User:item', 'read:User:item', 'read:User:collection', 'read:Company:User'])]
    #[Assert\NotBlank(message: 'Lastname must be specified.')]
    #[Assert\NotBlank(message: 'Lastname must be specified.')]
    #[Assert\Length(min: 3, minMessage: 'Lastname must be at least {{ limit }} characters.')]
    #[ApiProperty(openapiContext: ['type' => 'string', 'example' => 'Lastname'])]
    private ?string $lastname = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne(targetEntity: Company::class, inversedBy: 'users')]
    #[Assert\NotBlank(message: 'Company must be specified.')]
    #[Assert\NotNull(message: 'Company is required')]
    #[Groups(['create:User:item', 'read:User:item', 'read:User:collection'])]
    private ?Company $company = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['create:User:item', 'read:User:item', 'read:User:collection', 'read:Company:User'])]
    private ?string $avatar = null;

    #[Vich\UploadableField(mapping: 'user_avatar', fileNameProperty: 'avatar', size: 'imageSize')]
    #[Groups(['create:User:item', 'read:User:item', 'read:User:collection', 'read:Company:User'])]
    private ?File $avatarFile = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['create:User:item', 'read:User:item', 'read:User:collection', 'read:Company:User'])]
    public ?string $avatarUrl = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['create:User:item', 'read:User:collection'])]
    public ?string $logoBase64 = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['create:User:item',])]
    private ?int $imageSize = null;

    #[ORM\ManyToMany(targetEntity: Task::class, inversedBy: 'users')]
    private Collection $task;

    #[ORM\ManyToOne(targetEntity: UsersRole::class)]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['create:User:item', 'read:User:collection', 'read:User:item', 'read:User:Role'])]
    private ?UsersRole $roles = null;


    public function __construct()
    {
        $this->briefs = new ArrayCollection();
        $this->setCreatedAt(new \DateTimeImmutable());
        $this->task = new ArrayCollection();
     /*   if(empty($roles)) {
            $this->roles = ['USER'];
        }*/
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }


    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection<int, Brief>
     */
    public function getBriefs(): Collection
    {
        return $this->briefs;
    }

    public function addBrief(Brief $brief): static
    {
        if (!$this->briefs->contains($brief)) {
            $this->briefs->add($brief);
            $brief->setUsers($this);
        }

        return $this;
    }

    public function removeBrief(Brief $brief): static
    {
        if ($this->briefs->removeElement($brief)) {
            // set the owning side to null (unless already changed)
            if ($brief->getUsers() === $this) {
                $brief->setUsers(null);
            }
        }

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

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

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): static
    {
        $this->company = $company;

        return $this;
    }


    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): static
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getAvatarFile(): ?File
    {
        return $this->avatarFile;
    }

    public function setAvatarFile(?File $avatarFile): void
    {
        $this->avatarFile = $avatarFile;

        if (null !== $avatarFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getAvatarUrl(): ?string
    {
        return $this->avatarUrl;
    }

    public function setAvatarUrl(?string $avatarUrl): static
    {
        $this->avatarUrl = $avatarUrl;

        return $this;
    }

    public function setImageSize(?int $imageSize): void
    {
        $this->imageSize = $imageSize;
    }

    public function getImageSize(): ?int
    {
        return $this->imageSize;
    }

    public function getUsername(): ?string
    {
        return $this->email; // ou un autre champ unique utilisé comme username
    }


    public function getSalt(): ?string
    {
        // Vous pouvez retourner null si vous n'utilisez pas de sel (salt) pour le mot de passe
        return null;
    }


    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string)$this->email;
    }

    public function eraseCredentials(): void
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * @return Collection<int, Task>
     */
    public function getTask(): Collection
    {
        return $this->task;
    }

    public function addTask(Task $task): static
    {
        if (!$this->task->contains($task)) {
            $this->task->add($task);
        }

        return $this;
    }

    public function removeTask(Task $task): static
    {
        $this->task->removeElement($task);

        return $this;
    }


    public function getRole(): UsersRole
    {
        return $this->roles;
    }

    public function setRoles(?UsersRole $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    public function getRoles(): array
    {
        return [$this->roles->getName()]; // Retourne un tableau avec le rôle de l'utilisateur
    }

}
