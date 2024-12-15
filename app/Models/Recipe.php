<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{

    protected $fillable = [
        'name',
        'photo',
        'prep_time',
        'stars',
        'recipe_markdown',
        'preparation_markdown',
    ];

    protected $casts = [
        'prep_time' => 'integer',
        'stars' => 'integer',
    ];
}
