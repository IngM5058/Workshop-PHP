<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskMaster</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#2E073F',
                        secondary: '#7A1CAC',
                        accent: '#AD49E1',
                        light: '#EBD3F8',
                    },
                    fontFamily: {
                        'mono': ['"Roboto Mono"', 'monospace'],
                    },
                },
            },
        }
    </script>
</head>
<body class="bg-primary text-light p-8 font-mono">
    <nav class="bg-secondary p-4 mb-8">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-4xl font-bold text-light">TaskMaster</h1>
            <a href="/tasks/create" class="bg-accent hover:bg-light hover:text-primary text-primary font-bold py-2 px-4 rounded transition duration-300">Create Task</a>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto bg-secondary rounded-lg shadow-md overflow-hidden">
        <table class="min-w-full divide-y divide-accent">
            <thead class="bg-primary">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-light uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-light uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-light uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-light uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-secondary divide-y divide-accent">
                @foreach ($tasks as $task)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('tasks.edit', $task->id) }}" class="hover:text-accent">
                            {{ $task->title }}
                        </a>
                    </td>
                    <td class="px-6 py-4">{{ $task->description }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if ($task->completed)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-light text-primary">Completed</span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-accent text-primary">Not Completed</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded transition duration-300" onclick="return confirm('Are you sure you want to delete this task?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
