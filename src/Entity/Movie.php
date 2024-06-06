<?php

namespace App\Entity;

use App\Repository\MovieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MovieRepository::class)]
class Movie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 55)]
    private ?string $name = null;

    #[ORM\Column(length: 55, nullable: true)]
    private ?string $releaseYear = null;

    #[ORM\Column(length: 55, nullable: true)]
    private ?string $poster = null;

    #[ORM\Column(length: 55, nullable: true)]
    private ?string $averageRating = null;

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

    public function getReleaseYear(): ?string
    {
        return $this->releaseYear;
    }

    public function setReleaseYear(?string $releaseYear): static
    {
        $this->releaseYear = $releaseYear;

        return $this;
    }

    public function getPoster(): ?string
    {
        return $this->poster;
    }

    public function setPoster(?string $poster): static
    {
        $this->poster = $poster;

        return $this;
    }

    public function getAverageRating(): ?string
    {
        return $this->averageRating;
    }

    public function setAverageRating(?string $averageRating): static
    {
        $this->averageRating = $averageRating;

        return $this;
    }
}
