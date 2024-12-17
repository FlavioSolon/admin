<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Innovation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'subtitle',
        'card_title1', 'card_description1', 'card_icon1',
        'card_title2', 'card_description2', 'card_icon2',
        'card_title3', 'card_description3', 'card_icon3'
    ];

}
