<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Post;
use App\Controller\PixelGeneratorController;
use App\Repository\ProjectRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ApiResource(
    operations: [
        new Post(
            openapiContext: [
                'security' =>[ ['JWT' => [[]]]],
                'summary' => 'Create Project',
                'description' => 'Permet de créer un Projet',
            ],
            normalizationContext: ['groups' => ['read:Project:item']],
            denormalizationContext: ['groups' => ['create:Project:item']],
        ),
        new Post(

            uriTemplate: '/generatePixel',
            controller: PixelGeneratorController::class,
            openapiContext: [
                'requestBody' => ['required' => true,'description' => 'Générer un pixel de tracking', 'content' => ['application/json' => ['schema' => ['example' =>['offerNumber'=>'1234', 'pixelType'=>'img','eventType' =>'2', 'trackingParameter'=>'variableName' ]]]]],
                'security' =>[ ['JWT' => [[]]]],
                'summary' => 'Generate pixel',
                'description' => 'Permet de générer le type de pixel qui sera utilisé avec les valeurs adéquat.',
                'ApiProperty' =>[
                    'schema' =>['type' => 'string', 'example' => 'testtype@']
                ],
                'responses' => [
                    '200' => ['description' => 'Pixel créé', 'content' => ['schema' => ['type' => 'string', 'example' => ['<iframe src="https://track.oadstrack.com/?e=0&o=0000&leadid={leadid}" width="1" height="1"></iframe>', '<img src="https://track.oadstrack.com/?e=0&o=0000&leadid={leadid}" width="1" height="1">', 'https://track.oadstrack.com/?e=0&clickid={clickid}']]]]
                ]
            ],
            normalizationContext: ['groups' => ['read:Project:item']],
            denormalizationContext: ['groups' => ['create:Project:item']],
            name: 'app_pixel_generator'
        )
    ], collectDenormalizationErrors: true,
)]
#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['create:Project:item', 'read:Project:item'])]
    #[Assert\NotBlank(message: 'name must be specified.')]
    #[Assert\Length(min:6, max:100, minMessage: 'name must be at least {{ limit }} characters long.', maxMessage: 'name cannot exceed {{ limit }} characters.')]
    #[Assert\NotNull]
    #[ApiProperty( openapiContext: ['type' => 'string', 'example' => 'My Project Name'])]
    private ?string $name = null;

    #[ORM\Column]
    #[Groups(['read:Project:item'])]
    #[Assert\NotNull]
    private \DateTimeImmutable $createdAt;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\OneToOne(mappedBy: 'project', cascade: ['persist', 'remove'])]
    private ?Brief $brief = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['read:Project:item'])]
    private ?string $pixel = null;

    //type: Email, MB, LEX
    #[ORM\Column(length: 100, nullable: true)]
    #[Groups(['create:Project:item', 'read:Project:item'])]
    private ?string $type = null;

    #[ORM\OneToMany(mappedBy: 'project', targetEntity: Task::class)]

    private Collection $task;

    #[ORM\Column(nullable: false)]
    #[Groups(['create:Project:item', 'read:Project:item'])]
    #[Assert\Type(
        type: \DateTimeImmutable::class,
        message: 'The start date should be a valid date in the format YYYY-MM-DD.'
    )]
    private ?\DateTimeImmutable $startDate = null;

    #[ORM\Column]
    #[Groups(['create:Project:item', 'read:Project:item'])]
    private ?\DateTimeImmutable $endDate = null;

    #[ORM\Column(length: 150)]
    #[Groups(['create:Project:item', 'read:Project:item'])]
    private ?string $status = null;

    public function __construct(string $name)
    {
        $this->setName($name);
        $this->setCreatedAt(new \DateTimeImmutable( 'now', new \DateTimeZone('Europe/paris')));
        $this->setStartDate(\DateTimeImmutable::createFromFormat('Y-m-d', (new \DateTimeImmutable('now', new \DateTimeZone('Europe/Paris')))->format('Y-m-d')));
        $this->task = new ArrayCollection();
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

    public function getBrief(): ?Brief
    {
        return $this->brief;
    }

    public function setBrief(Brief $brief): static
    {
        // set the owning side of the relation if necessary
        if ($brief->getProject() !== $this) {
            $brief->setProject($this);
        }

        $this->brief = $brief;

        return $this;
    }

    public function getPixel(): ?string
    {
        return $this->pixel;
    }

    public function setPixel(?string $pixel): static
    {
        $this->pixel = $pixel;
        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

        return $this;
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
            $task->setProject($this);
        }

        return $this;
    }

    public function removeTask(Task $task): static
    {
        if ($this->task->removeElement($task)) {
            // set the owning side to null (unless already changed)
            if ($task->getProject() === $this) {
                $task->setProject(null);
            }
        }

        return $this;
    }

    public function getStartDate(): ?\DateTimeImmutable
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeImmutable $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeImmutable
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeImmutable $endDate): static
    {
        $this->endDate = $endDate;

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
}
