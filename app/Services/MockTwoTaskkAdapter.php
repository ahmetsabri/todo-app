<?php

namespace App\Services;

use App\Contracts\TaskInterface;

class MockTwoTaskkAdapter implements TaskInterface
{
    public function __construct(protected array $task, protected string $providerName) {}

    public function getName(): string
    {
        return $this->providerName.' '.$this->task['id'];
    }

    public function getDifficulty(): int
    {
        return $this->task['zorluk'];
    }

    public function getDuration(): int
    {
        return $this->task['sure'];
    }
}
