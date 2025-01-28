<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Events\NewsUpdated;

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
        'slug'
    ];


    protected $casts = [
        'date' => 'date',
        'authors' => 'array',
        'is_featured' => 'boolean',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($news) {
            $news->slug = Str::slug($news->title);
        });

        static::updating(function ($news) {
            if ($news->isDirty('title')) {
                $news->slug = Str::slug($news->title);
            }
        });
    }

    protected static function booted()
    {
        static::saved(fn() => broadcast(new NewsUpdated));
        static::deleted(fn() => broadcast(new NewsUpdated));
    }

}
