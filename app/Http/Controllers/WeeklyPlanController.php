<?php

namespace App\Http\Controllers;

use App\Repositories\DeveloperRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WeeklyPlanController extends Controller
{
    public function __construct(protected DeveloperRepository $developerRepository) {}

    public function __invoke(Request $request): View
    {
        $developers = $this->developerRepository->getAllWithTasks();

        $weeksRequired = $this->developerRepository->calculateWeeksRequired();

        return view('plan', compact('developers', 'weeksRequired'));
    }
}
