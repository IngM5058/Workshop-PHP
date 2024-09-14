<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'completed'];

    public function category()
    {
        return $this->belongsTo(TaskCategory::class, 'task_category_id');
    }
}
