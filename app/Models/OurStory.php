<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OurStory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
    ];
}
