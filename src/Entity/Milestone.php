<?php

namespace App\Entity;

class Milestone
{
    public function __construct(
        private string $language,
        private string $company,
        private string $logo,
        private string $location,
        private string $position,
        private string $startDate,
        private ?string $endDate,
        private string $description,
        private array $tags = [],
    ) {
        // Intentionally left blank.
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function getCompany(): string
    {
        return $this->company;
    }

    public function getLogo(): string
    {
        return $this->logo;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function getStartDate(): string
    {
        return $this->startDate;
    }

    public function getEndDate(): ?string
    {
        return $this->endDate;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getTags(): array
    {
        return $this->tags;
    }
}
