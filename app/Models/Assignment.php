<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use Notifiable;

    protected $fillable = ['project_id', 'task_id', 'user_id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
