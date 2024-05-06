<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Achievement extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'achievement_id' , 
        'user_id',
        'achievment_name',
        'achievment_description',
        'achievment_date'

    ];
}
