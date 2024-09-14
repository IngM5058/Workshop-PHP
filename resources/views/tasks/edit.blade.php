<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task - TaskMaster</title>
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
            <a href="{{ route('tasks.index') }}" class="bg-accent hover:bg-light hover:text-primary text-primary font-bold py-2 px-4 rounded transition duration-300">Back to Tasks</a>
        </div>
    </nav>

    <div class="max-w-2xl mx-auto bg-secondary rounded-lg shadow-md overflow-hidden">
        <form method="POST" class="p-6" action="{{ route('tasks.update', $task->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-light">Title</label>
                <input type="text" name="title" id="title" value="{{ $task->title }}" class="mt-1 block w-full rounded-md bg-primary border-accent text-light focus:border-light focus:ring-light" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-light">Description</label>
                <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md bg-primary border-accent text-light focus:border-light focus:ring-light" required>{{ $task->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="completed" class="inline-flex items-center">
                    <select name="completed" id="completed" class="mt-1 block w-full rounded-md bg-primary border-accent text-light focus:border-light focus:ring-light">
                        <option value="0" {{ !$task->completed ? 'selected' : '' }}>Not Completed</option>
                        <option value="1" {{ $task->completed ? 'selected' : '' }}>Completed</option>
                    </select>
                </label>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-accent hover:bg-light hover:text-primary text-primary font-bold py-2 px-4 rounded transition duration-300">Update Task</button>
            </div>
        </form>
    </div>
</body>
</html>
