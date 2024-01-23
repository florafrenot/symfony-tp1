<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompanyRepository::class)]
class Company
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $companyName = null;

    #[ORM\Column(length: 255)]
    private ?string $companyAdress = null;

    #[ORM\Column]
    private ?int $companyZipCode = null;

    #[ORM\Column(length: 50)]
    private ?string $companyCity = null;

    #[ORM\Column]
    private ?int $companyPhone = null;

    #[ORM\ManyToMany(targetEntity: Client::class, mappedBy: 'companies')]
    private Collection $clients;

    public function __construct()
    {
        $this->clients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(string $companyName): static
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getCompanyAdress(): ?string
    {
        return $this->companyAdress;
    }

    public function setCompanyAdress(string $companyAdress): static
    {
        $this->companyAdress = $companyAdress;

        return $this;
    }

    public function getCompanyZipCode(): ?int
    {
        return $this->companyZipCode;
    }

    public function setCompanyZipCode(int $companyZipCode): static
    {
        $this->companyZipCode = $companyZipCode;

        return $this;
    }

    public function getCompanyCity(): ?string
    {
        return $this->companyCity;
    }

    public function setCompanyCity(string $companyCity): static
    {
        $this->companyCity = $companyCity;

        return $this;
    }

    public function getCompanyPhone(): ?int
    {
        return $this->companyPhone;
    }

    public function setCompanyPhone(int $companyPhone): static
    {
        $this->companyPhone = $companyPhone;

        return $this;
    }

    /**
     * @return Collection<int, Client>
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Client $client): static
    {
        if (!$this->clients->contains($client)) {
            $this->clients->add($client);
            $client->addCompany($this);
        }

        return $this;
    }

    public function removeClient(Client $client): static
    {
        if ($this->clients->removeElement($client)) {
            $client->removeCompany($this);
        }

        return $this;
    }
}
