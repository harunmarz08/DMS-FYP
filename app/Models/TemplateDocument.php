<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateDocument extends Model
{
    use HasFactory;

    protected $table = 'template_docs';

    protected $fillable = [
        'project_id',
        'data1',
        'data2',
        'data3',
        'version',
    ];

    protected $casts = [
        'data1' => 'array',
        'data2' => 'array',
        'data3' => 'array',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
