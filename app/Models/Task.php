<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    public static function booted(): void
    {
        static::creating(function ($task) {
            $task->effort = $task->difficulty * $task->duration;
        });
    }

    public function scopeUnassigned(Builder $builder): Builder
    {
        return $builder->orderBy('effort', 'desc')->whereNull('developer_id');
    }
}
