<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Task extends Model
{

    protected $fillable = [
        'project_id',
        'title',
        'description',
        'status',
        'priority',
        'due_date',
    ];

    public function project(): BelongsTo {
        return $this->belongsTo(Project::class);
    }


    public function tags(): BelongsToMany {
        return $this->belongsToMany(tag_task::class);
    }

}
