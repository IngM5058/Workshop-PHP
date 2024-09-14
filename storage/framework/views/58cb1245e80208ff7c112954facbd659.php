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
            <a href="<?php echo e(route('tasks.index')); ?>" class="bg-accent hover:bg-light hover:text-primary text-primary font-bold py-2 px-4 rounded transition duration-300">Back to Tasks</a>
        </div>
    </nav>

    <div class="max-w-2xl mx-auto bg-secondary rounded-lg shadow-md overflow-hidden">
        <form action="<?php echo e(route('tasks.update', $task->id)); ?>" method="POST" class="space-y-4 p-6">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-light mb-2">Title</label>
                <input type="text" name="title" id="title" value="<?php echo e($task->title); ?>" class="mt-1 block w-full rounded-md bg-[#2E073F] text-white border-2 border-accent focus:border-light focus:ring-2 focus:ring-light p-3">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-light mb-2">Description</label>
                <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md bg-[#2E073F] text-white border-2 border-accent focus:border-light focus:ring-2 focus:ring-light p-3"><?php echo e($task->description); ?></textarea>
            </div>
            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium text-light mb-2">Category</label>
                <select name="category_id" id="category_id" class="mt-1 block w-full rounded-md bg-[#2E073F] text-white border-2 border-accent focus:border-light focus:ring-2 focus:ring-light p-3">
                    <option value="">Uncategorized</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php echo e($task->category_id == $category->id ? 'selected' : ''); ?>>
                            <?php echo e($category->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="mb-4">
                <label for="completed" class="block text-sm font-medium text-light mb-2">Status</label>
                <select name="completed" id="completed" class="mt-1 block w-full rounded-md bg-[#2E073F] text-white border-2 border-accent focus:border-light focus:ring-2 focus:ring-light p-3">
                    <option value="0" <?php echo e($task->completed ? '' : 'selected'); ?>>Pending</option>
                    <option value="1" <?php echo e($task->completed ? 'selected' : ''); ?>>Completed</option>
                </select>
            </div>
            <div>
                <button type="submit" class="bg-accent hover:bg-light hover:text-primary text-primary font-bold py-2 px-4 rounded transition duration-300">Update Task</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php /**PATH D:\Y3 works\Yapper's workshop\task-master\resources\views/tasks/edit.blade.php ENDPATH**/ ?>