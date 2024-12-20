<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductFeature extends Model
{
    use HasFactory;

    protected $table = "product_features";

    protected $fillable = ['title', 'subtitle', 'cards'];

    protected $casts = [
        'cards' => 'array',
    ];

}
