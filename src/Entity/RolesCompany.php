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

    /**
     * @var Collection<int, Company>
     */
    #[ORM\ManyToMany(targetEntity: Company::class, mappedBy: 'companyRole')]

    private Collection $companies;

    public function __construct()
    {
        $this->companies = new ArrayCollection();
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

    /**
     * @return Collection<int, Company>
     */
    public function getCompanies(): Collection
    {
        return $this->companies;
    }

    public function addCompany(Company $company): static
    {
        if (!$this->companies->contains($company)) {
            $this->companies->add($company);
            $company->addCompanyRole($this);
        }

        return $this;
    }

    public function removeCompany(Company $company): static
    {
        if ($this->companies->removeElement($company)) {
            $company->removeCompanyRole($this);
        }

        return $this;
    }


}
