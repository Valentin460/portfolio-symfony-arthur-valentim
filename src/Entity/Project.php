<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $thematic = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $context = null;

    #[ORM\Column(length: 255)]
    private ?string $tools = null;

    #[ORM\Column(length: 255)]
    private ?string $workingHours = null;

    #[ORM\Column(length: 255)]
    private ?string $period = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $need = null;

    #[ORM\Column(length: 255)]
    private ?string $technologies = null;

    #[ORM\Column(length: 255)]
    private ?string $documentation = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $conclusion = null;

    #[ORM\Column(length: 255)]
    private ?string $picture = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getThematic(): ?string
    {
        return $this->thematic;
    }

    public function setThematic(string $thematic): static
    {
        $this->thematic = $thematic;

        return $this;
    }

    public function getContext(): ?string
    {
        return $this->context;
    }

    public function setContext(string $context): static
    {
        $this->context = $context;

        return $this;
    }

    public function getTools(): ?string
    {
        return $this->tools;
    }

    public function setTools(string $tools): static
    {
        $this->tools = $tools;

        return $this;
    }

    public function getWorkingHours(): ?string
    {
        return $this->workingHours;
    }

    public function setWorkingHours(string $workingHours): static
    {
        $this->workingHours = $workingHours;

        return $this;
    }

    public function getPeriod(): ?string
    {
        return $this->period;
    }

    public function setPeriod(string $period): static
    {
        $this->period = $period;

        return $this;
    }

    public function getNeed(): ?string
    {
        return $this->need;
    }

    public function setNeed(string $need): static
    {
        $this->need = $need;

        return $this;
    }

    public function getTechnologies(): ?string
    {
        return $this->technologies;
    }

    public function setTechnologies(string $technologies): static
    {
        $this->technologies = $technologies;

        return $this;
    }

    public function getDocumentation(): ?string
    {
        return $this->documentation;
    }

    public function setDocumentation(string $documentation): static
    {
        $this->documentation = $documentation;

        return $this;
    }

    public function getConclusion(): ?string
    {
        return $this->conclusion;
    }

    public function setConclusion(string $conclusion): static
    {
        $this->conclusion = $conclusion;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }
}
