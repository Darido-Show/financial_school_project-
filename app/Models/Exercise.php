<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exercise extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'excercieses_id',
        'lesson_id',
        'question_id'
        
    ];

    public function lessons(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
