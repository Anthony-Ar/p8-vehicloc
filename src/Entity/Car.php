<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $monthPrice = null;

    #[ORM\Column]
    private ?int $yearPrice = null;

    #[ORM\Column]
    private ?int $places = null;

    #[ORM\Column]
    private ?int $transmission = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getMonthPrice(): ?int
    {
        return $this->monthPrice;
    }

    public function setMonthPrice(int $monthPrice): static
    {
        $this->monthPrice = $monthPrice;

        return $this;
    }

    public function getYearPrice(): ?int
    {
        return $this->yearPrice;
    }

    public function setYearPrice(int $yearPrice): static
    {
        $this->yearPrice = $yearPrice;

        return $this;
    }

    public function getPlaces(): ?int
    {
        return $this->places;
    }

    public function setPlaces(int $places): static
    {
        $this->places = $places;

        return $this;
    }

    public function getTransmission(): ?int
    {
        return $this->transmission;
    }

    public function setTransmission(int $transmission): static
    {
        $this->transmission = $transmission;

        return $this;
    }
}
