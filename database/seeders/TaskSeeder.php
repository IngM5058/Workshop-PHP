<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\TaskCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = TaskCategory::all();

        $tasks = [
            [
                'title' => 'Prepare quarterly report',
                'description' => 'Compile and analyze Q2 financial data for the executive meeting.',
                'completed' => false,
            ],
            [
                'title' => 'Update client database',
                'description' => 'Review and update contact information for all active clients.',
                'completed' => true,
            ],
            [
                'title' => 'Develop marketing strategy',
                'description' => 'Create a comprehensive marketing plan for the new product launch.',
                'completed' => false,
            ],
            [
                'title' => 'Conduct team performance reviews',
                'description' => 'Schedule and complete mid-year performance reviews for all team members.',
                'completed' => false,
            ],
            [
                'title' => 'Optimize website SEO',
                'description' => 'Analyze current SEO performance and implement improvements for better search rankings.',
                'completed' => true,
            ],
            [
                'title' => 'Plan company retreat',
                'description' => 'Organize logistics and activities for the annual company retreat in September.',
                'completed' => false,
            ],
            [
                'title' => 'Resolve customer support tickets',
                'description' => 'Address and close all outstanding high-priority customer support issues.',
                'completed' => true,
            ],
            [
                'title' => 'Update project management software',
                'description' => 'Research and implement new features in our project management tool to improve team efficiency.',
                'completed' => false,
            ],
            [
                'title' => 'Prepare for investor meeting',
                'description' => 'Compile key metrics and create a presentation for the upcoming investor meeting.',
                'completed' => false,
            ],
            [
                'title' => 'Review and approve expense reports',
                'description' => 'Go through submitted expense reports and approve or request changes as necessary.',
                'completed' => false,
            ],
        ];

        foreach ($tasks as $task) {
            $task['task_category_id'] = $categories->random()->id;
            Task::create($task);
        }
    }
}
