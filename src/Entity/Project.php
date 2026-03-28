<?php

namespace App\Entity;

class Project
{
    public function __construct(
        private string $language,
        private string $title,
        private string $category,
        private string $showcase,
        private ?string $image,
        private ?string $url,
        private ?string $urlLabel = null,
        private array $tags = [],
        private bool $featured = false,
    ) {
        // Intentionally left blank.
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getShowcase(): string
    {
        return $this->showcase;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function getUrlLabel(): ?string
    {
        return $this->urlLabel;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function isFeatured(): bool
    {
        return $this->featured;
    }
}
