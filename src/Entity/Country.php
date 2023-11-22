<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CountryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CountryRepository::class)]
#[ApiResource]
class Country
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'country', targetEntity: Tax::class, orphanRemoval: true)]
    private Collection $taxes;

    public function __construct()
    {
        $this->taxes = new ArrayCollection();
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
     * @return Collection<int, Tax>
     */
    public function getTaxes(): Collection
    {
        return $this->taxes;
    }

    public function addTax(Tax $tax): static
    {
        if (!$this->taxes->contains($tax)) {
            $this->taxes->add($tax);
            $tax->setCountry($this);
        }

        return $this;
    }

    public function removeTax(Tax $tax): static
    {
        if ($this->taxes->removeElement($tax)) {
            // set the owning side to null (unless already changed)
            if ($tax->getCountry() === $this) {
                $tax->setCountry(null);
            }
        }

        return $this;
    }
}
