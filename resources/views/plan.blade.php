<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Task List</h1>
        <h5 class="mb-4">Minimum required weeks: {{ $weeksRequired }} week</h5>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Max Effort</th>
                    <th>Workload</th>
                    <th>Tasks</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($developers as $developer)
                    <tr>
                        <td>{{ $developer->name }}</td>
                        <td>{{ $developer->max_effort }}</td>
                        <td>{{ $developer->workload }}</td>
                        <td>
                            <ul>
                                @foreach ($developer->tasks as $task)
                                    <li>
                                        {{ $task->name }} (duration: {{ $task->duration }}h /
                                        difficulty:{{ $task->difficulty }} )
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No tasks available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
