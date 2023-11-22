<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CouponRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CouponRepository::class)]
#[ApiResource]
class Coupon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $code = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?CouponType $type = null;

    #[ORM\Column]
    private ?int $discountPercent = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;

        return $this;
    }

    public function getType(): ?CouponType
    {
        return $this->type;
    }

    public function setType(?CouponType $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getDiscountPercent(): ?int
    {
        return $this->discountPercent;
    }

    public function setDiscountPercent(int $discountPercent): static
    {
        $this->discountPercent = $discountPercent;

        return $this;
    }
}
