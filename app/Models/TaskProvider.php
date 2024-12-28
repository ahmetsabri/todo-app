<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskProvider extends Model
{
    protected $guarded = [];

    public function casts(): array
    {
        return [
            'keys' => 'json',
        ];
    }

    public function getDurationAttribute()
    {
        return $this->keys['duration'];
    }

    public function getDifficultyAttribute()
    {
        return $this->keys['difficulty'];
    }
}
