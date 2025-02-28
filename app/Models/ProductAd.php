<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAd extends Model
{
    use HasFactory;

    protected $table = 'product_ads';

    /**
     * Campos que podem ser preenchidos.
     */
    protected $fillable = [
        'title',
        'image_path',
        'marketplace_url',
    ];

}
