<?php

namespace App\Contracts;

interface TaskInterface
{
    public function getName(): string;

    public function getDifficulty(): int;

    public function getDuration(): int;
}
