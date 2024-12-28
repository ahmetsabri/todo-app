<?php

namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;
use App\Actions\AssignTaskAction;
use App\Repositories\DeveloperRepository;

class AssignTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:assign-tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign tasks to developers';

    /**
     * Execute the console command.
     */

    public function __construct(protected AssignTaskAction $assignTaskAction, protected DeveloperRepository $developerRepository)
    {
        parent::__construct();
    }
    public function handle()
    {
        $tasks = Task::query()->unassigned()->get();

        $developers = $this->developerRepository->all();

        foreach ($tasks as $task) {
            $this->assignTaskAction->execute($task, developers: $developers);
        }

        $this->info('All tasks assigned!');
    }
}
