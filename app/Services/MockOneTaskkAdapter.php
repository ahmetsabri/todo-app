<?php

namespace App\Services;

use App\Contracts\TaskInterface;

class MockOneTaskkAdapter implements TaskInterface
{
    public function __construct(protected array $task, protected string $providerName) {}

    public function getName(): string
    {
        return $this->providerName.' '.$this->task['id'];
    }

    public function getDifficulty(): int
    {
        return $this->task['value'];
    }

    public function getDuration(): int
    {
        return $this->task['estimated_duration'];
    }
}
