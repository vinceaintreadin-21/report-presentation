<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    protected $fillable = ['quiz_id', 'option', 'is_correct'];

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }
}
