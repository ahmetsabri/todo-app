<?php

namespace App\Repositories;

use App\Models\Developer;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class DeveloperRepository
{
    public function all(): Collection
    {
        return Developer::all();
    }

    public function getAllWithTasks(): Collection
    {
        return Developer::with('tasks')->get();
    }

    public function calculateWeeksRequired(): int
    {
        return DB::table('developers')
            ->selectRaw('MAX(CEIL(workload / max_effort)) AS weeks_required')
            ->value('weeks_required');
    }
}
