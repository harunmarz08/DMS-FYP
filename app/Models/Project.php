<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name','created_by', 'user_id', 'status', 'collaborators'];

    protected $casts = [
        'collaborators' => 'array',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    
    public function templateDocuments()
    {
        return $this->hasMany(TemplateDocument::class);
    }

    public function latestTemplateDocument()
    {
        return $this->hasOne(TemplateDocument::class)->latest();
    }

    public function collaborators()
    {
        return $this->belongsToMany(User::class)
            ->whereIn('role', [0 ,1 ,2]);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}
