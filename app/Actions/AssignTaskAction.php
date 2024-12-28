<?php

namespace App\Actions;

use App\Models\Task;
use Illuminate\Support\Collection;

class AssignTaskAction
{
    public function execute(Task $task, Collection $developers)
    {
        $developer = $this->findSuitableDeveloper($task, $developers);

        if ($developer) {
            $task->update(['developer_id' => $developer->id]);
            $developer->update(['workload' => $developer->workload + $task->effort]);
        }
    }

    protected function findSuitableDeveloper(Task $task, $developers)
    {
        return $developers->first(function ($developer) use ($task) {
            return ($developer->workload + $task->effort) <= $developer->max_effort;
        });
    }
}
