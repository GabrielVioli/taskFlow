<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class Profile extends Model
{
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
