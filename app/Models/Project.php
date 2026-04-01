<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{


    protected $fillable = [
        'user_id',
        'name',
        'description',
        'status',
        'priority',
        'due_date',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function tasks(): hasMany {
        return $this->hasMany(Task::class);
    }


}

