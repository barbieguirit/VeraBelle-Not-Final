<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CustomerRepository::class)]
class Customer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $fullName = '';

    #[ORM\Column(length: 255, unique: true)]
    private string $email = '';

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phoneNumber = null;

    #[ORM\Column]
    private \DateTimeImmutable $registeredDate;

    #[ORM\Column]
    private int $totalOrders = 0;

    #[ORM\Column]
    private float $totalSpent = 0.0;

    #[ORM\Column(length: 50)]
    private string $status = 'active';

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $shippingAddress = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $billingAddress = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $notes = null;

    public function __construct()
    {
        $this->registeredDate = new \DateTimeImmutable();
    }

    // 🔹 ID
    public function getId(): ?int
    {
        return $this->id;
    }

    // 🔹 Full Name
    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): self
    {
        $this->fullName = $fullName;
        return $this;
    }

    // 🔹 Email
    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    // 🔹 Phone Number
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    // 🔹 Registered Date
    public function getRegisteredDate(): \DateTimeImmutable
    {
        return $this->registeredDate;
    }

    public function setRegisteredDate(\DateTimeInterface $registeredDate): self
    {
        $this->registeredDate = \DateTimeImmutable::createFromInterface($registeredDate);
        return $this;
    }

    // 🔹 Total Orders
    public function getTotalOrders(): int
    {
        return $this->totalOrders;
    }

    public function setTotalOrders(int $totalOrders): self
    {
        $this->totalOrders = $totalOrders;
        return $this;
    }

    // 🔹 Total Spent
    public function getTotalSpent(): float
    {
        return $this->totalSpent;
    }

    public function setTotalSpent(float $totalSpent): self
    {
        $this->totalSpent = $totalSpent;
        return $this;
    }

    // 🔹 Status
    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    // 🔹 Shipping Address
    public function getShippingAddress(): ?string
    {
        return $this->shippingAddress;
    }

    public function setShippingAddress(?string $shippingAddress): self
    {
        $this->shippingAddress = $shippingAddress;
        return $this;
    }

    // 🔹 Billing Address
    public function getBillingAddress(): ?string
    {
        return $this->billingAddress;
    }

    public function setBillingAddress(?string $billingAddress): self
    {
        $this->billingAddress = $billingAddress;
        return $this;
    }

    // 🔹 Notes
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;
        return $this;
    }
}
