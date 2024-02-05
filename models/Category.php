<?php

class Category
{
    private ?int $id = null;
    private array $channels = [];

    public function __construct(private string $name)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): void
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
    public function getChannels() : array {
        return $this->channels;
    }
    public function setChannels(array $channels) : void {
        $this->channels = $channels;
    }
}
