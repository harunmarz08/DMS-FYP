<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use Notifiable;

    protected $fillable = ['project_id', 'name', 'description', 'user_id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function documents()
    {
        return $this->hasMany(Document::class);
    }
    public function assignment()
    {
        return $this->hasOne(Assignment::class);
    }
}
