<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'translations',
        'correct_option_id',
        'level',
    ];

    protected $casts = [
        'translations' => 'array',
    ];
}
