<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Events\HomeUpdated;

class ProductFeature extends Model
{
    use HasFactory;

    protected $table = "product_features";

    protected $fillable = ['title', 'subtitle', 'cards'];

    protected $casts = [
        'cards' => 'array',
    ];

    protected static function booted()
    {
        static::saved(fn() => broadcast(new HomeUpdated));
        static::deleted(fn() => broadcast(new HomeUpdated));
    }

}
