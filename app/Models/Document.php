<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['project_id', 'task_id', 'filename', 'file_path', 'version'];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
