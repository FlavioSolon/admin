<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'date',
        'authors',
        'badge',
        'is_featured',
        'content_markdown',
    ];


    protected $casts = [
        'date' => 'date',
        'authors' => 'array',
        'is_featured' => 'boolean',
    ];
}
