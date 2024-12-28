<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    protected $guarded = [];

    public static function booted()
    {
        static::creating(function ($dev) {
            $dev->max_effort = $dev->effort_per_Hour * 45;
        });
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
