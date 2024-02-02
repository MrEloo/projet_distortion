<?php

class Channel
{
    private ?int $id = null;
    private Category $category;
    private string $name;
    private array $posts;

    public function __construct(Category $category, string $name)
    {
        $this->category = $category;
        $this->name = $name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }
    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    public function getPosts(): array
    {
        return $this->posts;
    }
    public function setPosts(array $posts): void
    {
        $this->posts = $posts;
    }
}
